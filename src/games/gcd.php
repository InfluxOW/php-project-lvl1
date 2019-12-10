<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\game;

const EXERCISE_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function GCDGame()
{
    $getQuestionAndCorrectAnswer = function () {

        $first = rand(0, 100);
        $second = rand(0, 100);

        $question = "{$first}, {$second}";
        $correctAnswer = getGCD($first, $second);
        
        return [$question, $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function getGCD($a, $b)
{
    $large = $a > $b ? $a : $b;
    $small = $a > $b ? $b : $a;
    $remainder = $large % $small;
    return 0 === $remainder ? $small : getGCD($small, $remainder);
}
