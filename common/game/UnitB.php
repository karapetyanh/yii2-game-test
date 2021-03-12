<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\game;

/**
 * Description of UnitB
 *
 * @author Hayk
 */
class UnitB extends Unit implements UnitInterface{
    protected $attackPower = 25;
    protected $heart = 220;
    protected $defendingPercentage = 30;
    protected $isDied = false;
    protected $recover = 11;
}
