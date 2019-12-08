<?php

namespace BrainGames\Src\Games\BrainRoot;

use function BrainGames\Src\Cli\game;

const EXERCISE_DESCRIPTION = 'Find an integer whose square is closest to the specified.';

function rootGame()
{
    $getQuestionAndCorrectAnswer = function () {

        $question = rand(1, 1000);
        $correctAnswer = getRoundedRoot($question);
        
        return [$question, $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function getRoundedRoot($question)
{
    return round(pow($question, 0.5));
}
