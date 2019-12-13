<?php

namespace BrainGames\games\even;

use function BrainGames\engine\game;

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
