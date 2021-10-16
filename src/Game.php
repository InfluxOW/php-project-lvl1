<?php

namespace BrainGames;

use BrainGames\Games\AbstractGame;
use Exception;

use function cli\line;
use function cli\prompt;

class Game
{
    private const ROUNDS_COUNT = 3;

    /**
     * @throws Exception
     */
    public static function play(AbstractGame $game, string $userName): void
    {
        line("(!!!) Game mission: " . $game->getMission() . PHP_EOL);

        for ($roundCounter = 1; $roundCounter <= self::ROUNDS_COUNT; $roundCounter++) {
            $game->prepareQuestionAndCorrectAnswer();

            line("Question: " . $game->getQuestion());

            $userAnswer = prompt('Your answer');
            $correctAnswer = (string) $game->getCorrectAnswer();

            if ($userAnswer === $correctAnswer) {
                line("Correct!" . PHP_EOL);
            } else {
                line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
                line("Let's try again, {$userName}!");

                return;
            }
        }

        line("Congratulations, {$userName}!");
    }

    public static function welcome(): string
    {
        line(PHP_EOL . 'Welcome to the Brain Games!' . PHP_EOL);
        $userName = prompt('May I have your name?');
        line("Hello, {$userName}!" . PHP_EOL);

        return $userName;
    }
}
