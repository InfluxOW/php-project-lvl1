<?php

namespace BrainGames\features\random;

use function BrainGames\games\calc\calcGame;
use function BrainGames\games\even\evenGame;
use function BrainGames\games\gcd\GCDGame;
use function BrainGames\games\prime\primeGame;
use function BrainGames\games\progression\progressionGame;
use function BrainGames\games\root\rootGame;

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
