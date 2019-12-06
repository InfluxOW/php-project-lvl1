<?php

namespace BrainGames\Src\Games\BrainCalc;

use function BrainGames\Src\Cli\game;

const EXERCISE_DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = ['+', '-', '*'];

function calc()
{
    $getQuestionAndCorrectAnswer = function () {
        
        $firstNumber = rand(0, 50);
        $secondNumber = rand(0, 50);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        
        $question = "{$firstNumber} {$operation} {$secondNumber}";

        switch ($operation) {
            case '+':
                $correctAnswer = $firstNumber + $secondNumber;
                break;
            case '-':
                $correctAnswer = $firstNumber - $secondNumber;
                break;
            case '*':
                $correctAnswer = $firstNumber * $secondNumber;
                break;
        }

        return [$question, $correctAnswer];
    };

    game(EXERCISE_DESCRIPTION, $getQuestionAndCorrectAnswer);
}
