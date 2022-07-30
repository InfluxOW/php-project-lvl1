<?php

namespace BrainGames\Games;

final class Prime extends Game
{
    public const GAME_NAME = 'prime';

    protected static string $mission = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $number = random_int(0, 100);

        $this->question = $number;
        $this->correctAnswer = $this->isPrime($number) ? 'yes' : 'no';
    }

    private function isPrime(int $number): bool
    {
        if ($number <= 1) {
            return false;
        }

        for ($start = 2; $start <= $number / 2; $start++) {
            if ($number % $start === 0) {
                return false;
            }
        }

        return true;
    }
}
