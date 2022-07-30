<?php

namespace BrainGames\Games;

use Exception;

abstract class Game
{
    protected static string $mission;

    protected string|int $question;
    protected string|float|int $correctAnswer;

    public static function getMission(): string
    {
        return static::$mission;
    }

    public function getQuestion(): string|int
    {
        return $this->question;
    }

    public function getCorrectAnswer(): string|float|int
    {
        return $this->correctAnswer;
    }

    /**
     * @throws Exception
     */
    abstract public function prepareQuestionAndCorrectAnswer(): void;
}
