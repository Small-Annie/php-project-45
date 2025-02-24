<?php

namespace Php\Project\Games\GCD;

use function Php\Project\Engine\playGame;

function gcd(int $num1, int $num2): int
{
    return ($num1 % $num2 === 0) ? $num2 : gcd($num2, $num1 % $num2);
}

function playGameGCD(): void 
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $game = function () {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $expression = "{$number1} {$number2}";
        $correctAnswer = gcd($number1, $number2);
        return [$expression, (string) $correctAnswer];
    };

    playGame($gameDescription, $game);
}