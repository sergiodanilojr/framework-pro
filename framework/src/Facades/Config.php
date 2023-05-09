<?php

namespace Framework\Facades;
use Framework\Facades\AbstractFacade;
use Framework\Support\Config\ConfigInterface;

class Config extends AbstractFacade
{
    protected static function accessor()
    {
        return ConfigInterface::class;
    }
}