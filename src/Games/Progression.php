<?php

namespace BrainGames\Games;

class Progression extends AbstractGame
{
    public const GAME_NAME = 'progression';
    private const PROGRESSION_LENGTH = 10;

    protected static string $mission = 'What number is missing in the progression?';

    public function prepareQuestionAndCorrectAnswer(): void
    {
        $step = random_int(1, 10);
        $progressionStart = random_int(0, 100);
        $progression = $this->generateProgression($step, $progressionStart, self::PROGRESSION_LENGTH);
        $hiddenElementIndex = array_rand($progression);

        $this->correctAnswer = $progression[$hiddenElementIndex];

        $progression[$hiddenElementIndex] = '?';
        $this->question = implode(' ', $progression);
    }

    private function generateProgression(int $step, int $progressionStart, int $progressionLength): array
    {
        $progression = [];
        for ($i = 0; $i <= $progressionLength; $i++) {
            $progression[] = $progressionStart + $i * $step;
        }

        return $progression;
    }
}
