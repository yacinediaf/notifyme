<?php

namespace YacineDiaf\LaravelNotifyme\Tests\Feature;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use YacineDiaf\LaravelNotifyme\Models\Device;
use YacineDiaf\LaravelNotifyme\Tests\TestCase;

class DeviceControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_updates_device_token_when_there_is_an_existing_device(): void
    {
        $user = User::factory()->create();
        $device = Device::factory(['user_id' => $user->id])->create();
        $newDevice = Device::factory(['user_id' => $user->id])->make();

        $response = $this->actingAs($user)->post(
            '/api/v1/save_device_token',
            [
                'device_token' => $newDevice->device_token,
                'device_info' => $newDevice->device_info,
            ]
        );
        $this->assertNotEquals($user->devices()->latest()->first(), $newDevice->device_token);
        $response->assertStatus(200);
    }

    #[Test]
    public function it_creates_new_device_token_when_there_is_no_existing_device(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(
            '/api/v1/save_device_token',
            [
                'device_token' => Str::random(250),
                'device_info' => 'SAMSUNG',
                'user_id' => $user->id,
            ]
        );
        $this->assertEquals(1, $user->fresh()->devices->count());
        $this->assertEquals('SAMSUNG', $user->fresh()->devices()->latest()->first()->device_info);
        $response->assertStatus(200);
    }

    #[Test]
    public function it_checks_whether_a_user_has_one_devices_or_more(): void
    {
        $user = User::factory()->create();
        Device::factory(['user_id' => $user->id])->create();

        $this->assertCount(1, $user->fresh()->devices);
    }

    #[Test]
    public function it_returns_null_if_user_doesnt_have_device_token_before(): void
    {
        $user = User::factory()->create();
        $result = $user->hasDevice('iphone 14');

        $this->assertNull($result);
        // $this->assertNotEquals($user->devices()->latest()->first(), $newDevice->device_token);
    }

    #[Test]
    public function it_returns_true_if_user_already_has_a_device_with_a_given_device_name(): void
    {
        $user = User::factory()->create();
        $device = Device::factory(['user_id' => $user->id, 'device_info' => 'iphone 14'])->create();
        $result = $user->fresh()->hasDevice('iphone 14');

        $this->assertInstanceOf(Device::class, $result);
        // $this->assertNotEquals($user->devices()->latest()->first(), $newDevice->device_token);
    }
}
