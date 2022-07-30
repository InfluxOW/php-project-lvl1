<?php

namespace BrainGames\Games;

final class Gcd extends Game
{
    public const GAME_NAME = 'gcd';

    protected static string $mission = 'Find the greatest common divisor of given numbers.';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $a = random_int(0, 100);
        $b = random_int(0, 100);

        $this->question = "{$a}, {$b}";
        $this->correctAnswer = $this->getGcd($a, $b);
    }

    private function getGcd(int $a, int $b): int
    {
        $max = max($a, $b);
        $min = min($a, $b);
        $remainder = $max % $min;

        return ($remainder === 0) ? $min : $this->getGcd($min, $remainder);
    }
}
