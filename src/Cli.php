<?php

namespace BrainGames\Cli;

use function BrainGames\games\calc\calcGame;
use function BrainGames\games\even\evenGame;
use function BrainGames\games\gcd\GCDGame;
use function BrainGames\games\prime\primeGame;
use function BrainGames\games\progression\progressionGame;
use function BrainGames\games\root\rootGame;
use function BrainGames\features\random\chooseRandomGame;
use function cli\line;
use function cli\prompt;

const HELP = <<<'DOC'

Brain games

Usage:
  brain-games
  brain-games (-h|--help)
  brain-games (--list)
  brain-games (--random)

Options:
  -h --help                     Show this screen
  --list                        Show list of games with their missions
  --random                      Run random game
DOC;

const GAMES_LIST = <<<'DOC'
calc                            What is the result of the expression?
even                            Answer "yes" if the number is even, otherwise answer "no".
gcd                             Find the greatest common divisor of given numbers.
prime                           Answer "yes" if given number is prime. Otherwise answer "no".
progression                     What number is missing in the progression?
root                            Find an integer whose square is closest to the specified.
DOC;

function run()
{
    $args = \Docopt::handle(HELP);

    if ($args ['--list']) {
        print_r(GAMES_LIST . PHP_EOL);
        return;
    }
    if ($args ['--random']) {
        chooseRandomGame();
        return;
    }
    
    $gameName = prompt('What game do you want to play?');

    switch ($gameName) {
        case 'calc':
            calcGame();
            break;
        case 'even':
            evenGame();
            break;
        case 'gcd':
            GCDGame();
            break;
        case 'prime':
            primeGame();
            break;
        case 'progression':
            progressionGame();
            break;
        case 'root':
            rootGame();
            break;
        default:
            print_r('Start application with -h option for more help.' . PHP_EOL);
            throw new \Exception('The game you\'ve chosen does not exist.');
            break;
    }
}
