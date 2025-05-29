<?php

namespace YacineDiaf\LaravelNotifyme\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \YacineDiaf\LaravelNotifyme\LaravelNotifyme
 */
class LaravelNotifyme extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \YacineDiaf\LaravelNotifyme\LaravelNotifyme::class;
    }
}
