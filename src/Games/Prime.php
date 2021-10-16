<?php

namespace BrainGames\Games;

class Prime extends AbstractGame
{
    public const GAME_NAME = 'prime';

    protected static string $mission = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $this->question = random_int(0, 100);
        $this->correctAnswer = $this->isPrime($this->question) ? 'yes' : 'no';
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
