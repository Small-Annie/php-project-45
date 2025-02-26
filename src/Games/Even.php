<?php

namespace Php\Project\Games\Even;

use function Php\Project\Engine\playGame;

function playGameEven(): void
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $game = function () {
        $number = rand(1, 100);
        $correctAnswer = ($number % 2 === 0) ? 'yes' : 'no';
        return [(string) $number, $correctAnswer];
    };

    playGame($gameDescription, $game);
}
