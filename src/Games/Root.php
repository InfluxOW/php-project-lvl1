<?php

namespace BrainGames\Games;

final class Root extends Game
{
    public const GAME_NAME = 'root';

    protected static string $mission = 'Find an integer whose square is closest to the given one.';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $number = random_int(1, 1000);

        $this->question = $number;
        $this->correctAnswer = $this->getRoundedRoot($number);
    }

    private function getRoundedRoot(int $number): int
    {
        return (int) round($number ** 0.5);
    }
}
