<?php

use Illuminate\Routing\Route;
use YacineDiaf\LaravelNotifyme\Controllers\DeviceController;

/**Device Token */

Route::prefix('api')->post('/save_device_token', [DeviceController::class, 'store']);