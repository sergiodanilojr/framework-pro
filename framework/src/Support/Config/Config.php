<?php

namespace Framework\Support\Config;

class Config implements ConfigInterface
{
    protected $items = [];

    public function get(?string $key): mixed
    {
        if (!$this->has($key)) {
            return null;
        }

        return $this->items[$key];
    }

    public function set(string $key, array $value = []): array
    {
        $this->items[$key] = $value ?? [];

        return $this->items[$key];
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }
}
