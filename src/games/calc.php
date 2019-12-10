<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\game;

const EXERCISE_DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = ['+', '-', '*'];

function calcGame()
{
    $getQuestionAndCorrectAnswer = function () {
        
        $first = rand(0, 50);
        $second = rand(0, 50);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        
        $question = "{$first} {$operation} {$second}";

        switch ($operation) {
            case '+':
                $correctAnswer = $first + $second;
                break;
            case '-':
                $correctAnswer = $first - $second;
                break;
            case '*':
                $correctAnswer = $first * $second;
                break;
        }

        return [$question, $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}
