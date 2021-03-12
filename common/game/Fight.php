<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\game;

use yii\base\BaseObject;

/**
 * Description of Fight
 *
 * @author Hayk
 */
class Fight extends BaseObject{
    
    public Team $team1;
    public Team $team2;
    
    private ?Team $winner = null; 
    
    public function start() : void{
        GameLog::log('GAME STARTED');
        $team1 = $this->team1;
        $team2 = $this->team2;
        
        $whoTurn = $team1;
        $deffender = $team2;
        GameLog::log("{$whoTurn->name} WILL START");
        
        while($this->getWinner() === null){
            GameLog::log("ATTACKER TEAM: {$whoTurn->name}, DEFFENDER TEAM: {$deffender->name}");
            $attacker = $whoTurn->findAttacker();
            //atack to team
            $this->atack($attacker, $deffender);
            if (!$deffender->haveNotDiedUnit()){
                GameLog::log("{$whoTurn->name} WINS THE GAME");
                $this->setWinner($whoTurn);
                return;
            }
            
            $deffender->recoverUnits();

            $tempTeam = $whoTurn;
            $whoTurn = $deffender;
            $deffender = $tempTeam;
        }
    }
    
    public function setWinner(Team $team) : void{
        $this->winner = $team;
    }
    
    public function getWinner() : ?Team {
        return $this->winner;
    }
    
    private function atack(UnitInterface $attacker, Team $team){
        $attackPower = $attacker->getAttackPower();
        GameLog::log('ATTACKER ' . get_class($attacker));
        GameLog::log("ATTACKERPOWER $attackPower");
        
        while ($attackPower > 0){
            
            foreach ($team->teamData as $unit){
                
                if ($unit->getIsDied()){
                    continue;
                }
                
                $heart = $unit->getHeart();
                
                GameLog::log('ATTACKING TO ' . get_class($unit));
                GameLog::log('DEFENDER HEART WITH DEFENDING PERCENTAGE ' . $heart);
                
                $unit->takeAttack($attackPower);
                $attackPower = $attackPower - $heart;

                $unit->getIsDied() ? GameLog::log('DEFENDER UNIT died') : GameLog::log('DEFENDER not died, have heart ' . $unit->getHeart());
                
                if ($attackPower <= 0){
                    break;
                }
            }
            
            //all units died set attackpower to 0 to break while
            $attackPower = 0;
        }
    }
}
