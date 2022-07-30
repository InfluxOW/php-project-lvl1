<?php

namespace BrainGames\Games;

use Exception;

final class Calc extends Game
{
    public const GAME_NAME = 'calc';

    protected static string $mission = 'What is the result of the expression?';

    private const OPERATIONS = [self::ADDITION, self::SUBTRACTION, self::MULTIPLICATION];
    private const ADDITION = '+';
    private const SUBTRACTION = '-';
    private const MULTIPLICATION = '*';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $a = random_int(0, 50);
        $b = random_int(0, 50);
        $operation = array_rand(array_flip(self::OPERATIONS));

        $this->question = "{$a} {$operation} {$b}";
        $this->correctAnswer = match ($operation) {
            self::ADDITION => $a + $b,
            self::SUBTRACTION => $a - $b,
            self::MULTIPLICATION => $a * $b,
            default => throw new Exception(),
        };
    }
}
