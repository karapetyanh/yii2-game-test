<?php

namespace common\game;

use yii\base\BaseObject;
use yii\base\InvalidArgumentException;
/**
 * Description of TeamParser
 *
 * @author Hayk
 */
class TeamParser extends BaseObject{
    
    public string $inputString;
    
    CONST A_TYPE = 'A';
    CONST B_TYPE = 'B';
    CONST C_TYPE = 'C';
    
    const TYPES = [
        self::A_TYPE => UnitA::class,
        self::B_TYPE => UnitB::class,
        self::C_TYPE => UnitC::class
    ];
    
    //put your code here
    
    public function getTeamArray():array {
        
        $returnArray = [];

        for ($i = 0; $i < strlen($this->inputString); $i++){
            $char = $this->inputString[$i];
            
            if (!isset(self::TYPES[$char])){
                throw new InvalidArgumentException("$char NOT FOUND IN OUR UNITS WRONG STRING");
            }
            
            $className = self::TYPES[$char];
            $returnArray[] = new $className();
        }
        
        return $returnArray;
    }
}
