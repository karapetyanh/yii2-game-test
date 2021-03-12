<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\game;

/**
 * Description of UnitC
 *
 * @author Hayk
 */
class UnitC extends Unit implements UnitInterface{
    protected $attackPower = 18;
    protected $heart = 50;
    protected $defendingPercentage = 50;
    protected $isDied = false;
    protected $recover = 30;
}
