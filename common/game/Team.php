<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\game;

use yii\base\BaseObject;
use yii\base\InvalidCallException;

/**
 * Description of Team
 *
 * @author Hayk
 */
class Team extends BaseObject{
    
    public array $teamData;
    public string $name;
    
    public function findAttacker() : UnitInterface{
        
        $returnUnit = null;
        //TODO Check yii2 methods to do this
        foreach ($this->teamData as $unit){
            
            if ($unit->getIsDied()){
                continue;
            }
            
            if ($returnUnit === null){
                $returnUnit = $unit;
            }
            
            if ($unit->getAttackPower() > $returnUnit->getAttackPower()){
                $returnUnit = $unit;
            }
        }
        
        if ($returnUnit === null){
            throw new InvalidCallException("ALL MEMBERS ARE DIED");
        }
        
        return $returnUnit;
    }
    
    public function getNotDiedUnits() : array {
        return array_filter($this->teamData, function($unit){
            return $unit->getIsDied() === false;
        });
    }
    
    public function haveNotDiedUnit() : bool{
        return count($this->getNotDiedUnits()) !== 0;
    }
    
    public function recoverUnits() : void {
        foreach ($this->getNotDiedUnits() as $unit){
            GameLog::log('RECOVERING UNIT ' . get_class($unit));
            GameLog::log('BEFORE RECOVER ' . $unit->getHeart());
            $unit->recoverUnit();
            GameLog::log('AFTER RECOVER ' . $unit->getHeart());
        }
    }
}
