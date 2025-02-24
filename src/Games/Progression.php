<?php

namespace Php\Project\Games\Progression;

use function Php\Project\Engine\playGame;

function playGameProgression(): void 
{
    $gameDescription = 'What number is missing in the progression?';
    $game = function () {
        $firstNumber = rand(1, 100);
        $progressionStep = rand(1, 10);
        $progressionLength = rand(5, 10);
        $hiddenNumberIndex = rand(0, $progressionLength - 1);
        $progression = [$firstNumber];
        
        for ($index = 1; $index < $progressionLength; $index++) {
            $progression[] = $progression[$index - 1] + $progressionStep;
            
        }

        $correctAnswer = $progression[$hiddenNumberIndex];
        $progression[$hiddenNumberIndex] = '..';
        $expression = implode(' ', $progression);
        
        return [$expression, (string) $correctAnswer];
    };

    playGame($gameDescription, $game);
}