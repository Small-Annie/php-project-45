<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

function playGame(string $gameDescription, callable $game): void 
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameDescription);

    $ROUNDS = 3;

    for ($round = 1; $round <= $ROUNDS; $round++) {
        [$task, $correctAnswer] = $game();
        line("Question: %s", $task);
        $playerAnswer = prompt("Your answer:");

        if ($playerAnswer === $correctAnswer) {
            line("Correct!");  
        } else {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.", 
                $playerAnswer, $correctAnswer
            );
            line("Let's try again, %s!", $name);
            return;
        }    
    }

    line("Congratulations, %s!", $name);
}