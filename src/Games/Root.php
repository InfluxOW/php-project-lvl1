<?php

namespace BrainGames\Games;

class Root extends AbstractGame
{
    public const GAME_NAME = 'root';

    protected static string $mission = 'Find an integer whose square is closest to the given one.';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $this->question = random_int(1, 1000);
        $this->correctAnswer = $this->getRoundedRoot($this->question);
    }

    private function getRoundedRoot(int $number): int
    {
        return round($number ** 0.5);
    }
}
