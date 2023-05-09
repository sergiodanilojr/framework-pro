<?php

namespace Framework\Support\Config;

interface EnvInterface
{
    public function is(string $key, $value, bool $deep = false): bool;
    
    public function get(?string $key, $default = null): mixed;

    public function set(string $key, $value);

    public function has(string $key): bool;
}
