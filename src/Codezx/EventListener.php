<?php

namespace Codezx;

use pocketmine\player\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use Codezx\Loader;
use pocketmine\event\Listener;
use pocketmine\Server;

class EventListener implements Listener {

    public function onPlayerJoin(PlayerJoinEvent $ev){
        $player = $ev->getPlayer();
        $message = Loader::getInstance()->getConfig()->get("messages")["join"];
        $message = str_replace("{NAME}", $player->getName(), $message);
        $ev->setJoinMessage($message);
        if(Loader::getInstance()->getConfig()->get("join-menu") === true){
            Loader::getInstance()->getUtilsManager()->getJoinMenu($player);
        }
    }

    public function onPlayerQuit(PlayerQuitEvent $ev){
        $player = $ev->getPlayer();
        $message = Loader::getInstance()->getConfig()->get("messages")["quit"];
        $message = str_replace("{NAME}", $player->getName(), $message);
        $ev->setQuitMessage($message);
    }
}