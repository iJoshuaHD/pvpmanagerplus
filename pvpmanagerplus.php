<?php
/*
__PocketMine Plugin__
name=PvPManager
version=0.3
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
	public function pvp() {
	$player1 = $this->$data["entity"]->player->username;

	if ($player1->entity->getHealth() == 2) {
                     $this->api->console->run("clearinventory " . $data["entity"]->player->username);
                     $this->api->console->run("sudo " . $data["entity"]->player->username . " spawn");
                     $this->api->chat->broadcast("" . $data["entity"]->player->username . " has been killed.");
	         }
		else
		 {
		return false;
		}

	}
		
        public function EventHandler($data, $event){
                switch($event){
                case "player.interact":
						$player2 = $this->$data["targetentity"]->player->username;
                        if($player2->entity->getHealth() == 2 and $this->$data["entity"]->player->username){                 

                                                $this->api->console->run("clearinventory " . $data["targetentity"]->player->username);
                                                $this->api->console->run("sudo " . $data["targetentity"]->player->username . " spawn");
                                                $this->api->chat->broadcast("" . $data["targetentity"]->player->username . " was killed by " . $data["entity"]->player->username);
                                                                   }
										else{
										return false;
										}
                                
                        
                                           break;
                         }
         	}
        }
