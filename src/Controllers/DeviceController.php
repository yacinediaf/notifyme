<?php

namespace YacineDiaf\LaravelNotifyme\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use YacineDiaf\LaravelNotifyme\Requests\DeviceTokenRequest;

class DeviceController implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('auth:sanctum')];
    }

    /**
     * Store device information
     *
     * This endpoint allows to attach user with one or many devices (device token, device info),
     * in order to receive notification from the system.
     */
    public function store(DeviceTokenRequest $request)
    {
        $attributes = $request->validated();
        $deviceToken = $attributes['device_token'];
        $deviceInfo = $attributes['device_info'];
        //Update device_token if the device already exists
        if ($device = request()->user()->hasDevice($deviceInfo)) {
            $device->update([
                'device_token' => $deviceToken,
            ]);
            return response()->json(['message' => 'Device information updated successfully.']);
        }
        //Attach new device to user
        $request->user()->attachDevice($attributes);
        return response()->json(['message' => 'Device information created successfully.']);
    }
}
