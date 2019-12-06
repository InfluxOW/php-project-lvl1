<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Cli\game;

const EXERCISE_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function evenNumbers()
{
    $getQuestionAndCorrectAnswer = function () {

        $question = rand();
        $correctAnswer = isEven($question) ? "yes" : "no";
        
        return [$question, $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function isEven($question)
{
    return ($question % 2 === 0);
}
