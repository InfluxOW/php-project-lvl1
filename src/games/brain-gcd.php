<?php

namespace BrainGames\Src\Games\BrainGCD;

use function BrainGames\Src\Cli\game;

const EXERCISE_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function greatestCommonDivisor()
{
    $getQuestionAndCorrectAnswer = function () {

        $firstNumber = rand(0, 100);
        $secondNumber = rand(0, 100);

        $question = "{$firstNumber}, {$secondNumber}";
        $correctAnswer = getGCD($firstNumber, $secondNumber);
        
        return [$question, $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function getGCD($a, $b) 
{
    $large = $a > $b ? $a: $b;
    $small = $a > $b ? $b: $a;
    $remainder = $large % $small;
    return 0 === $remainder ? $small : getGCD($small, $remainder);
}
