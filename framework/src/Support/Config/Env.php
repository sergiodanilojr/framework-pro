<?php

namespace Framework\Support\Config;

class Env implements EnvInterface
{
    protected $items = [];

    public function get(?string $key, $default = null): mixed
    {
        if (!$this->has($key)) {
            $this->set($key, $default);
        }

        return $this->items[$key];
    }

    public function set(string $key,  $value)
    {
        $this->items[$key] = $value ?? [];

        return $this->items[$key];
    }

    public function is(string $key, $value, bool $deep = false): bool
    {
        if(!$this->has($key)){
            return false;
        }

        if($deep){
            return $this->get($key) === $value;
        }

        return $this->get($key) == $value;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }
}