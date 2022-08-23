<?php

namespace Codezx;

use pocketmine\plugin\PluginBase;
use Codezx\EventListener;
use pocketmine\Server;

class Loader extends PluginBase {

    public static $instance;

    public function onEnable(): void{
        self::$instance = $this;
        $this->prefix = $this->getConfig()->get("prefix");
        Server::getInstance()->getPluginManager()->registerEvents(new EventListener(), $this);
    }

    public static function getInstance(): Loader{
        return self::$instance;
    }
}