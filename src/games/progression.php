<?php

namespace BrainGames\games\progression;

use function BrainGames\engine\game;

const EXERCISE_DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function progressionGame()
{
    $getQuestionAndCorrectAnswer = function () {

        $step = rand(1, 10);
        $progressionStart = rand(0, 100);
        $originalProgression = generateProgression($step, $progressionStart, PROGRESSION_LENGTH);
        $progression = $originalProgression;
        $hiddenElementIndex = array_rand($progression);
        $progression[$hiddenElementIndex] = "..";

        $question = implode(' ', $progression);
        $correctAnswer = $originalProgression[$hiddenElementIndex];

        return [$question, (string) $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}

function generateProgression($step, $progressionStart, $progressionLength)
{
    for ($i = 0; $i <= PROGRESSION_LENGTH; $i++) {
        $result[] = $progressionStart + $i * $step;
    }

    return $result;
}
