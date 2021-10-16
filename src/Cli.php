<?php

namespace BrainGames;

use BrainGames\Game as CoreGame;
use BrainGames\Games\AbstractGame;
use BrainGames\Games\Calc;
use BrainGames\Games\Even;
use BrainGames\Games\Gcd;
use BrainGames\Games\Prime;
use BrainGames\Games\Progression;
use BrainGames\Games\Root;
use Docopt;
use Exception;

use function cli\prompt;

class Cli
{
    private const HELP = <<<'DOC'

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

    private const GAMES_LIST = <<<'DOC'
        calc                            What is the result of the expression?
        even                            Answer "yes" if given number is even, otherwise answer "no".
        gcd                             Find the greatest common divisor of given numbers.
        prime                           Answer "yes" if given number is prime. Otherwise answer "no".
        progression                     What number is missing in the progression?
        root                            Find an integer whose square is closest to the specified one.
    DOC;

    public const AVAILABLE_GAMES_TO_ITS_CLASSNAMES = [
        Calc::GAME_NAME => Calc::class,
        Even::GAME_NAME => Even::class,
        Gcd::GAME_NAME => Gcd::class,
        Prime::GAME_NAME => Prime::class,
        Progression::GAME_NAME => Progression::class,
        Root::GAME_NAME => Root::class,
    ];

    private const EXIT_CODE_SUCCESS = 0;
    private const EXIT_CODE_GENERIC_ERROR = 1;

    /**
     * @noinspection ForgottenDebugOutputInspection
     */
    public static function run(): void
    {
        $args = Docopt::handle(self::HELP);

        if ($args['--list']) {
            print_r(self::GAMES_LIST . PHP_EOL);
            exit(self::EXIT_CODE_SUCCESS);
        }

        $userName = CoreGame::welcome();
        $gameName = $args['--random'] ? array_rand(array_flip(array_keys(self::AVAILABLE_GAMES_TO_ITS_CLASSNAMES))) : prompt('What game do you want to play?');

        if (array_key_exists($gameName, self::AVAILABLE_GAMES_TO_ITS_CLASSNAMES)) {
            /** @var AbstractGame $gameClassName */
            $gameClassName = self::AVAILABLE_GAMES_TO_ITS_CLASSNAMES[$gameName];

            try {
                CoreGame::play(new $gameClassName(), $userName);
                exit(self::EXIT_CODE_SUCCESS);
            } catch (Exception $e) {
                print_r($e->getMessage());
                exit(self::EXIT_CODE_GENERIC_ERROR);
            }
        }

        print_r('The game you\'ve chosen does not exist.' . PHP_EOL);
        exit(self::EXIT_CODE_GENERIC_ERROR);
    }
}
