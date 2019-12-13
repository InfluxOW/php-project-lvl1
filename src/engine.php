<?php

namespace BrainGames\engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function game($mission, $getQuestionAndCorrectAnswer)
{
    line('Welcome to the Brain Game!');
    PHP_EOL;
    line($mission);
    PHP_EOL;
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    for ($roundCounter = 1; $roundCounter <= ROUNDS_COUNT; $roundCounter++) {
        [$question, $correctAnswer] = $getQuestionAndCorrectAnswer();
        line("Question: $question");

        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correctAnswer) {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }
        line("Correct!");
    }
    line("Congratulations, $name!");
}
