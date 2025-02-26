<?php

namespace Php\Project\Games\Prime;

use function Php\Project\Engine\playGame;

function isPrime(int $num): bool
{
    if ($num === 1) {
        return false;
    }

    for ($divider = 2; $divider <= round($num / 2); $divider++) {
        if ($num % $divider === 0) {
            return false;
        }
    }
    
    return true;
}


function playGamePrime(): void
{
    $gameDescription = <<<END
    Answer "yes" if given number is prime. Otherwise answer "no".  
    END;
    $game = function () {
        $number = rand(1, 100);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        return [(string) $number, $correctAnswer];
    };

    playGame($gameDescription, $game);
}
