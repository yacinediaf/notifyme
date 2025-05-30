<?php

namespace YacineDiaf\LaravelNotifyme\Concerns;

use Illuminate\Database\Eloquent\Relations\HasMany;
use YacineDiaf\LaravelNotifyme\Models\Device;

trait HasDevice
{
    /**
     * Each user may have one or many device tokens
     */
    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function latestDevice()
    {
        return $this->devices()->latest()->first();
    }

    /**
     * Attach a device token to specific user
     */
    public function attachDevice(array $attributes): Device
    {
        return $this->devices()->create($attributes);
    }

    /**
     * Forget Device token this is not taken in
     * consideration user has many devices
     * it just delete them all
     */
    public function forgetDevice()
    {
        return $this->devices()->delete();
    }

    /**
     * Get the user device using its name
     */
    public function hasDevice($device)
    {
        return $this->devices()
            ->where('device_info', $device)
            ->first();
    }

    public function routeNotificationForFcm()
    {
        return $this->devices()->latest()->first()->device_token;
    }
}
