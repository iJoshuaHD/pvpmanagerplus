<?php
/*
__PocketMine Plugin__
name=PvPManager
version=0.1
description=Manages PvP.
author=iJoshuaHD
class=PvPMang
apiversion=11,12,13
*/

class PvPMang implements Plugin{
        private $api;
        public function __construct(ServerAPI $api, $server = false){
                $this->api = $api;
        }
        public function init(){
                $this->api->addHandler("player.interact", array($this, "EventHandler"));
        }
        public function __destruct(){
        }
        public function EventHandler($data, $event){
                switch($event){
                case "player.interact":
                        $this->TEMP[$data["player"]->username] = true;
                        if(isset($this->TEMP[$data["entity"]->player->username]) and $this->TEMP[$data["entity"]->player->username] == true){                 
                                $players = $this->api->player->online();
                                for($i=0;$i<count($players);$i++){
                                        $player = $this->api->player->get($players[$i]);
                                        if($player->entity->getHealth() != 2){
                                                $this->api->console->run("clearinventory " . $data["targetentity"]->player->username);
                                                $this->api->console->run("sudo " . $data["targetentity"]->player->username . " spawn");
                                                $this->api->chat->broadcast("" . $data["targetentity"]->player->username . " was killed by " . $data["entity"]->player->username);
                                        }
                                }
                        }
                        break;
                }
        }
}
