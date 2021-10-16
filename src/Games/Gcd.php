<?php

namespace BrainGames\Games;

class Gcd extends AbstractGame
{
    public const GAME_NAME = 'gcd';

    protected static string $mission = 'Find the greatest common divisor of given numbers.';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $first = random_int(0, 100);
        $second = random_int(0, 100);

        $this->question = "{$first}, {$second}";
        $this->correctAnswer = $this->getGcd($first, $second);
    }

    private function getGcd(int $a, int $b): int
    {
        $large = $a > $b ? $a : $b;
        $small = $a > $b ? $b : $a;
        $remainder = $large % $small;

        return ($remainder === 0) ? $small : $this->getGcd($small, $remainder);
    }
}
