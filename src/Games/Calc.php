<?php

namespace BrainGames\Games;

use Exception;

class Calc extends AbstractGame
{
    public const GAME_NAME = 'calc';

    protected static string $mission = 'What is the result of the expression?';

    private const OPERATIONS = [self::ADDITION, self::SUBTRACTION, self::MULTIPLICATION];
    private const ADDITION = '+';
    private const SUBTRACTION = '-';
    private const MULTIPLICATION = '*';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $first = random_int(0, 50);
        $second = random_int(0, 50);
        $operation = array_rand(array_flip(self::OPERATIONS));

        $this->question = "{$first} {$operation} {$second}";
        $this->correctAnswer = match ($operation) {
            self::ADDITION => $first + $second,
            self::SUBTRACTION => $first - $second,
            self::MULTIPLICATION => $first * $second,
            default => throw new Exception(),
        };
    }
}
