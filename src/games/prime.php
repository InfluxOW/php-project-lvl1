<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\game;

const EXERCISE_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function primeGame()
{
    $getQuestionAndCorrectAnswer = function () {
        
        $question = rand(0, 100);
        $correctAnswer = isPrime($question) ? "yes" : "no";

        return [$question, $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function isPrime($num)
{
    if ($num <= 1) {
        return false;
    }

    for ($start = 2; $start <= $num / 2; $start++) {
        if ($num % $start === 0) {
            return false;
        }
    }

    return true;
}
