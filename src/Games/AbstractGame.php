<?php

namespace BrainGames\Games;

use Exception;

abstract class AbstractGame
{
    public const GAME_NAME = null;

    protected static string $mission;

    protected string $question;
    protected string|float|int $correctAnswer;

    public function getMission(): string
    {
        return static::$mission;
    }

    public function getQuestion(): string
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
