<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\game;

/**
 * Description of UnitA
 *
 * @author Hayk
 */
class UnitA extends Unit implements UnitInterface{
    protected $attackPower = 150;
    protected $heart = 500;
    protected $defendingPercentage = 20;
    protected $isDied = false;
    protected $recover = 23;
}
