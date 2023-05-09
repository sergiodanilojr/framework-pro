<?php

namespace Framework\Console\Command;

class MigrateDatabase implements CommandInterface
{
    protected string $signature = "";
    protected string $description = "";

    public function execute(array $params = []): int
    {
        echo "Migrating Database command...".PHP_EOL;

        return 0;
    }
}