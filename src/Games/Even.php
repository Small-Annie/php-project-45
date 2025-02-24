<?php

namespace Php\Project\Games\Even;

use function cli\line;
use function cli\prompt;

function playGame() 
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $counterCorrectAnswers = 0;

    while ($counterCorrectAnswers < 3) {
        $number = rand(1, 100);
        line("Question: %d", $number);
        $playerAnswer = prompt("Your answer:");
        $correctAnswer = ($number % 2 === 0) ? 'yes' : 'no';

        if ($playerAnswer === $correctAnswer) {
            line("Correct!");
            $counterCorrectAnswers++;   
        } else {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $playerAnswer, $correctAnswer
            );
            line("Let's try again, %s!", $name);
            break; 
        }
    }

    if ($counterCorrectAnswers === 3) {
        line("Congratulations, %s!", $name);
    } 
}