<?php

namespace Framework\Facades;
use Framework\Facades\AbstractFacade;

use Framework\Support\Config\EnvInterface;

class DB extends AbstractFacade
{
    protected static function accessor()
    {
        return EnvInterface::class;
    }
}