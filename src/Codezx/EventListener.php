<?php

namespace Codezx;

use pocketmine\player\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use Codezx\Loader;
use pocketmine\event\Listener;

class EventListener implements Listener {

    public function onPlayerJoin(PlayerJoinEvent $ev){
        $player = $ev->getPlayer();
        if(Loader::getInstance()->getConfig()->get("join-menu") === true){
            Loader::getInstance()->getUtilsManager()->getJoinMenu($player);
        }
    }
}