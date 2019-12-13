<?php

namespace BrainGames\games\progression;

use function BrainGames\engine\game;

const EXERCISE_DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function progressionGame()
{
    $getQuestionAndCorrectAnswer = function () {
        
        $originalProgression = generateProgression(PROGRESSION_LENGTH);
        $hiddenProgression = $originalProgression;
        $indexToHide = array_rand($hiddenProgression);
        $hiddenProgression[$indexToHide] = "..";

        $question = implode(' ', $hiddenProgression);
        $correctAnswer = $originalProgression[$indexToHide];

        return [$question, (string) $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function generateProgression($progressionLength)
{
    $step = rand(1, 10);
    $result = [];
    $progressionStart = rand(0, 100);

    for ($i = 0; $i <= $progressionLength; $i++) {
        $result[] = $progressionStart + $i * $step;
    }
    return $result;
}
