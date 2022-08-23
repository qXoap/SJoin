<?php

namespace Codezx;


use pocketmine\player\Player;
use Forms\FormAPI\SimpleForm;
use Codezx\Loader;

class Utils {

    public function getJoinMenu(Player $player){
        $menu = new SimpleForm(function (Player $player, int $data = null){
            if($data === null){
                return true;
            }
            switch($data){
                case 0:
                    if(Loader::getInstance()->getConfig()->get("button")["tip"] === true){
                        $player->sendTip(Loader::getInstance()->getConfig()->get("button")["tip-message"]);
                    }
                    if(Loader::getInstance()->getConfig()->get("button")["popup"] === true){
                        $player->sendPopup(Loader::getInstance()->getConfig()->get("button")["popup-message"]);
                    }
                    if(Loader::getInstance()->getConfig()->get("button")["title"] === true){
                        $player->sendTitle(Loader::getInstance()->getConfig()->get("button")["title-message"], Loader::getInstance()->getConfig()->get("button")["subtitle-message"]);
                    }
                    if(Loader::getInstance()->getConfig()->get("button")["message"] === true){
                        $player->sendMessage(Loader::getInstance()->getConfig()->get("button")["message"]);
                    }
                break;
            }
        });
        $menu->setTitle(Loader::getInstance()->getConfig()->get("form")["menu-title"]);
        $menu->setContent(Loader::getInstance()->getConfig()->get("form")["menu-content"]);
        $menu->addButton(Loader::getInstance()->getConfig()->get("form")["menu-button"],Loader::getInstance()->getConfig()->get("form")["menu-button-image-type"],Loader::getInstance()->getConfig()->get("form")["menu-button-image"]);
        $player->sendForm($menu);
        return $menu;
    }
}