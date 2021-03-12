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
 * Description of Unit
 *
 * @author Hayk
 */
class Unit extends BaseObject implements UnitInterface{
    
    protected $attackPower = 0;
    protected $heart = 0;
    protected $defendingPercentage = 0;
    protected $isDied = true;
    protected $recover = 0;
    protected $maxHeart = 0;
    
    public function init(){
        //update heart as $defendingPercentage same as user have more heart;
        $this->heart = (int) ((($this->heart) * (100 + $this->defendingPercentage))/100);
        $this->maxHeart = $this->heart;
        parent::init();
    }
    //put your code here
    public function getAttackPower(): int {
        return $this->attackPower;
    }
    
    public function getHeart() : int{
        return $this->heart;
    }
    
    public function getDefendingPercentage(): int {
        return $this->defendingPercentage;
    }
        
    public function getIsDied() : bool {
        return $this->isDied;
    }
    
    public function takeAttack(int $attack) : void {
        $this->heart = $this->heart - $attack;
        
        if ($this->heart <= 0){
            $this->isDied = true;
        }
    }
    
    public function recoverUnit() : void {
        
        if ($this->isDied === true){
            throw new InvalidCallException('You can not recover died unit');
        }
        
        if ($this->heart < $this->maxHeart){
            $maxRecoverHeart = $this->maxHeart - $this->heart;
            $recoverHeart = (int) ((($this->recover) * (100 + $this->defendingPercentage))/100);
            
            $this->heart = $recoverHeart > $maxRecoverHeart ? $this->maxHeart : $this->heart + $recoverHeart;
        }
    }
}
