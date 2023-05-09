<?php

namespace Framework\Database;

interface ConnectionFactoryInterface
{
    public function create(string $driver);
}