<?php

namespace BrainGames\Src\Games\BrainPrime;

use function BrainGames\Src\Cli\game;

const EXERCISE_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function prime()
{
    $getQuestionAndCorrectAnswer = function () {
        
        $question = rand(0, 100);
        $correctAnswer = isPrime($question) ? "yes" : "no";

        return [$question, $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function isPrime($question)
{
    $primeNumbersLessThan100 = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
    return (in_array($question, $primeNumbersLessThan100));
}
