<?php

namespace BrainGames\Engines;

use BrainGames\Games\Game;

interface Engine
{
    public function start(Game $game): void;

    public function welcome(): void;
}
