<?php

namespace YacineDiaf\LaravelNotifyme\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Support\Str;

class DeviceTokenRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'device_token' => ['required', 'string'],
            'device_info' => ['required', 'string']
        ];
    }

    /**
     * If you want to include display the body parameter in the documentation, you can use the following method
     * in order to expose them and make them available discoverable especially if you're working
     * with SCRIBE 
     */

    // public function bodyParameters()
    // {
    //     return [
    //         'user_id' => [
    //             'description' => 'User id must be included in the request',
    //             'example' => 4
    //         ],
    //         'device_token' => [
    //             'description' => 'This is the generated device token from the FCM SDK on the app',
    //             'example' => Str::random(200)
    //         ],
    //         'device_info' => [
    //             'decription' => 'This contains additional information about the device info',
    //             'example' => 'Iphone 12 pro'
    //         ]
    //     ];
    // }
}
