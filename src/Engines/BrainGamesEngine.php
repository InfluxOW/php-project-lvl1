<?php

namespace BrainGames\Engines;

use BrainGames\Games\Game;
use Exception;

use function cli\line;
use function cli\prompt;

final class BrainGamesEngine implements Engine
{
    private const ROUNDS_COUNT = 3;

    private string $userName;

    /**
     * @throws Exception
     */
    public function start(Game $game): void
    {
        line("(!!!) Game mission: " . $game::getMission() . PHP_EOL);

        for ($roundCounter = 1; $roundCounter <= self::ROUNDS_COUNT; $roundCounter++) {
            $game->prepareQuestionAndCorrectAnswer();

            line("Question: " . $game->getQuestion());

            $userAnswer = prompt('Your answer');
            $correctAnswer = (string) $game->getCorrectAnswer();

            if ($userAnswer === $correctAnswer) {
                line("Correct!" . PHP_EOL);
            } else {
                line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
                line("Let's try again, {$this->userName}!");

                return;
            }
        }

        line("Congratulations, {$this->userName}!");
    }

    public function welcome(): void
    {
        line(PHP_EOL . 'Welcome to the Brain Games!' . PHP_EOL);
        $userName = prompt('May I have your name?');
        line("Hello, {$userName}!" . PHP_EOL);

        $this->userName = $userName;
    }
}
