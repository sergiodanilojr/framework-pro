<?php

namespace Framework\Support\Config;

interface ConfigInterface
{
    public function get(?string $key): mixed;

    public function set(string $key, array $value = []): array;

    public function has(string $key): bool;
}
