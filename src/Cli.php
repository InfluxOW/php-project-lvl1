<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function game($mission, $getQuestionAndFindCorrectAnswer)
{
    line('Welcome to the Brain Game!');
    PHP_EOL;
    line($mission);
    PHP_EOL;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($roundCounter = 1; $roundCounter <= ROUNDS_COUNT; $roundCounter++) {
        [$question, $correctAnswer] = $getQuestionAndFindCorrectAnswer();
        line("Question:, %s!", $question);

        $gameAnswer = prompt('Your answer');

        if ($gameAnswer !== $correctAnswer) {
            line("'{$gameAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line ("Let's try again, {$name}");
            return;
        }
        line("Correct!");
    }
    line ("Congratulations, {$name}");
}

function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}