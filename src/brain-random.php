<?php

namespace BrainGames\Src\BrainRandom;

use function BrainGames\Src\Games\BrainCalc\calcGame;
use function BrainGames\Src\Games\BrainEven\evenNumbersGame;
use function BrainGames\Src\Games\BrainGCD\greatestCommonDivisorGame;
use function BrainGames\Src\Games\BrainPrime\primeGame;
use function BrainGames\Src\Games\BrainProgression\progressionGame;

function chooseRandomGame()
{
    $randomNumber = rand(0, 4);
    switch ($randomNumber) {
        case '0':
            calcGame();
            break;
        case '1':
            evenNumbersGame();
            break;
        case '2':
            greatestCommonDivisorGame();
            break;
        case '3':
            primeGame();
            break;
        case '4':
            progressionGame();
            break;
    }
}
