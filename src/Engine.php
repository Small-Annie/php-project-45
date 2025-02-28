<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function playGame(string $gameDescription, callable $playGame): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameDescription);

    for ($round = 1; $round <= ROUNDS; $round++) {
        [$task, $correctAnswer] = $playGame();
        line("Question: %s", $task);
        $playerAnswer = prompt("Your answer:");

        if ($playerAnswer !== $correctAnswer) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $playerAnswer,
                $correctAnswer
            );
            line("Let's try again, %s!", $name);
            return;
        }
        
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}
