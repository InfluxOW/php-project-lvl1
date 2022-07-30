<?php

namespace BrainGames\Games;

final class Even extends Game
{
    public const GAME_NAME = 'even';

    protected static string $mission = 'Answer "yes" if given number is even, otherwise answer "no".';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $number = mt_rand();

        $this->question = $number;
        $this->correctAnswer = $this->isEven($number) ? 'yes' : 'no';
    }

    private function isEven(int $number): bool
    {
        return $number % 2 === 0;
    }
}
