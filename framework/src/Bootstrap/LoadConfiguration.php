<?php

namespace Framework\Bootstrap;

use Exception;
use Framework\Container\Application;
use Framework\Support\Config\Config;
use Framework\Support\Config\ConfigInterface;
use ReflectionClass;

class LoadConfiguration
{
    public function bootstrap(Application $app)
    {
        $app->add(ConfigInterface::class, Config::class);
       
        
       

        $files = $this->getConfigurationFiles($app);

        if (!isset($files['app'])) {
            throw new Exception("O arquivo de configuração da aplicação precisa ser disponibilizado!");
        }

        foreach ($files as $name => $value) {
            $app->get(ConfigInterface::class)->set($name, require $value);
        }
    }

    protected function getConfigurationFiles(Application $app)
    {
        if (!is_dir($configPath = $app->configPath())) {
            throw new Exception("A pasta de configurações precisa ser definida");
        }

        $scanDir = array_filter(
            scandir($configPath),
            fn ($item) => !is_dir($app->configPath() . "/$item")
        );

        $files = [];

        foreach ($scanDir as $file) {
            $info = pathinfo($file);

            if ($info['extension'] === 'php') {
                $files[$info['filename']] = $app->configPath() . "/" . basename($file);
            }
        }

        return $files;
    }
}
