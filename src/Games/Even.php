<?php

namespace BrainGames\Games;

class Even extends AbstractGame
{
    public const GAME_NAME = 'even';

    protected static string $mission = 'Answer "yes" if given number is even, otherwise answer "no".';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $this->question = mt_rand();
        $this->correctAnswer = $this->isEven($this->question) ? 'yes' : 'no';
    }

    private function isEven(int $number): bool
    {
        return $number % 2 === 0;
    }
}
