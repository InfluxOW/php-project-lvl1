<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\game;

const EXERCISE_DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function progressionGame()
{
    $getQuestionAndCorrectAnswer = function () {
        
        $progression = generateProgression(PROGRESSION_LENGTH);
        $newProgressing = $progression;
        $unknownNumberIndex = array_rand($newProgressing);
        $newProgressing[$unknownNumberIndex] = "..";

        $question = implode(' ', $newProgressing);
        $correctAnswer = $progression[$unknownNumberIndex];

        return [$question, $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function generateProgression($progressionLength)
{
    $step = rand(1, 10);
    $result = [];
    $firstNumber = rand(0, 100);

    for ($i = 0; $i <= $progressionLength; $i++) {
        $result[] = $firstNumber + $i * $step;
    }
    return $result;
}