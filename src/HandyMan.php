<?php

namespace JDarwind\Handyman;

use Symfony\Component\Console\Application;

class HandyMan extends Application
{
    protected static HandyMan|null $instance = null;
    protected array $config = [];

    protected function __construct(string $name = 'UNKNOWN', string $version = 'UNKNOWN')
    {
        $this->config = include_once "./config/config.php";

        $applicationVersion = $this->getConfig('version');
        $applicationName = $this->getConfig('applicationName');

        parent::__construct($applicationName,$applicationVersion);
    }

    public static function create():self
    {
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getConfig(string $key): ?string{
        return $this->config[$key] ?? null;
    }
    public function getConfigs(): array{
        return $this->config;
    }
}