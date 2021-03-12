<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\game;
use yii\helpers\Console;
use yii\base\InvalidConfigException;

/**
 * Description of GameLog
 *
 * @author Hayk
 */
class GameLog {
    
    const CLI_TYPE = 'cli';
    
    //for now just log given string
    public static function log(string $string) : void{
        
        if (php_sapi_name() === self::CLI_TYPE){
            $loggerClass = Console::class;
        }else {
            throw new InvalidConfigException('LOG NOT CONFIGURED YET');
        }
        
        $loggerClass::output(date('Y-m-d H:i:s') . ' ' . $string);
    }
}
