<?php

namespace BrainGames\Features\Random;

use function BrainGames\Games\Calc\calcGame;
use function BrainGames\Games\Even\evenGame;
use function BrainGames\Games\GCD\GCDGame;
use function BrainGames\Games\Prime\primeGame;
use function BrainGames\Games\Progression\progressionGame;
use function BrainGames\Games\Root\rootGame;

function chooseRandomGame()
{
    $random = rand(0, 5);
    switch ($random) {
        case '0':
            calcGame();
            break;
        case '1':
            evenGame();
            break;
        case '2':
            GCDGame();
            break;
        case '3':
            primeGame();
            break;
        case '4':
            progressionGame();
            break;
        case '5':
            rootGame();
            break;
    }
}
