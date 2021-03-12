<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\game;

/**
 *
 * @author Hayk
 */
interface UnitInterface {
    
    public function getAttackPower() : int;
    public function getHeart() : int;
    public function getDefendingPercentage(): int;
    public function getIsDied() : bool;
    public function takeAttack(int $attack) : void;
    public function recoverUnit(): void;
}
