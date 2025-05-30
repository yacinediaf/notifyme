<?php

use Illuminate\Support\Facades\Route;
use YacineDiaf\LaravelNotifyme\Controllers\DeviceController;

/**Device Token */
Route::post('/save_device_token', [DeviceController::class, 'store']);
