<?php

namespace Framework\ServiceProvider;

use Framework\Console\Command\CommandInterface;
use ReflectionClass;


class ConsoleServiceProvider extends ServiceProvider
{

    protected $commands = [

    ];

    protected $provides = [];

    public function register(): void
    {
        foreach($this->commands as $command){
            $reflection = new ReflectionClass($command);
            
            if(is_subclass_of($command, CommandInterface::class)){
               $this->getContainer()->add($reflection->getProperty('signature'), $command); 
            }
        }
    }
}
