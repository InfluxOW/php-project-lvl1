<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\game;

const EXERCISE_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function evenGame()
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
