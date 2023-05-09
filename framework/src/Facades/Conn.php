<?php

namespace Framework\Facades;

use Framework\Database\ConnectionFactoryInterface;
use Framework\Facades\AbstractFacade;


class Conn extends AbstractFacade
{
    protected static function accessor()
    {
        return ConnectionFactoryInterface::class;
    }
}