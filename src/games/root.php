<?php

namespace BrainGames\games\root;

use function BrainGames\engine\game;

const EXERCISE_DESCRIPTION = 'Find an integer whose square is closest to the specified.';

function rootGame()
{
    $getQuestionAndCorrectAnswer = function () {

        $question = rand(1, 1000);
        $correctAnswer = getRoundedRoot($question);
        
        return [$question, (string) $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function getRoundedRoot($question)
{
    return round(pow($question, 0.5));
}
