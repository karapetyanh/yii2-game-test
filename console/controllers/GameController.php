<?php

namespace console\controllers;

use yii\console\Controller;

use common\game\TeamParser;
use common\game\Team;
use common\game\Fight;

/**
 * Description of GameController
 *
 * @author Hayk
 */
class GameController extends Controller{
    
    public function actionIndex($s1 = 'ABCBBBBAAAACCCBBB', $s2 = 'BBBCCCAAAABBBCCCC'){
        
        $team1Data = new TeamParser([
            'inputString' => $s1
        ]);
        
        $team2Data = new TeamParser([
            'inputString' => $s2
        ]);
        

        $team1 = new Team([
            'teamData' => $team1Data->getTeamArray(),
            'name' => 'Team 1'
        ]);
        
        $team2 = new Team([
            'teamData' => $team2Data->getTeamArray(),
            'name' => 'Team 2'
        ]);
        
        $figthClass= new Fight([
            'team1' => $team1,
            'team2' => $team2,
        ]);
        
        $figthClass->start();     
    }
    //put your code here
}
