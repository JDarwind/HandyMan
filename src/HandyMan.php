<?php

namespace JDarwind\Handyman;

use Symfony\Component\Console\Application;

class HandyMan extends Application
{
    protected static HandyMan|null $instance = null;
    protected array $config = [];

    protected function __construct(string $name = 'UNKNOWN', string $version = 'UNKNOWN')
    {
        parent::__construct($name,$version);
        $this->config = include_once "./config/config.php";
    }

    public static function create(string $name = 'UNKNOWN', string $version = 'UNKNOWN'):self
    {

        if(!self::$instance){
            self::$instance = new self($name, $version);
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