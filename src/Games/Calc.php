<?php

namespace Php\Project\Games\Calc;

use function Php\Project\Engine\playGame;

function playGameCalc(): void 
{
    $gameDescription = 'What is the result of the expression?';
    $game = function () {
        $operators = ['+', '-', '*'];
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $operator = $operators[rand(0, 2)];
    
        $expression = "{$number1} {$operator} {$number2}";
    
        $correctAnswer = match ($operator) {
            '+' => $number1 + $number2,
            '-' => $number1 - $number2,
            '*' => $number1 * $number2,
        }; 
        
        return [$expression, (string) $correctAnswer];
    };

    playGame($gameDescription, $game);
}