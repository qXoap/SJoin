<?php

namespace Codezx;

use pocketmine\plugin\PluginBase;
use Codezx\EventListener;
use pocketmine\Server;
use Codezx\Utils;

class Loader extends PluginBase {

    public static $instance;

    public $utils;

    public function onEnable(): void{
        self::$instance = $this;
        $this->utils = new Utils();
        Server::getInstance()->getPluginManager()->registerEvents(new EventListener(), $this);
    }

    public function getUtilsManager(): Utils {
        return $this->utils;
    }

    public static function getInstance(): Loader{
        return self::$instance;
    }
}