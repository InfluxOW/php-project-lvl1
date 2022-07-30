<?php

namespace BrainGames;

use BrainGames\Engines\BrainGamesEngine;
use BrainGames\Games\Calc;
use BrainGames\Games\Even;
use BrainGames\Games\Game;
use BrainGames\Games\Gcd;
use BrainGames\Games\Prime;
use BrainGames\Games\Progression;
use BrainGames\Games\Root;
use Docopt;
use Exception;

use function cli\prompt;

final class Cli
{
    private const HELP = <<<'DOC'

    Brain games

    Usage:
        brain-games
        brain-games (-h|--help)
        brain-games (--list)
        brain-games (--random)
    
    Options:
        -h --help                       Show this screen
        --list                          Show list of games with their missions
        --random                        Run random game

    DOC;

    public const AVAILABLE_GAMES = [
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
     * @param class-string<Game>|null $gameClassName
     *
     * @noinspection ForgottenDebugOutputInspection
     */
    public static function run(?string $gameClassName = null): void
    {
        $args = Docopt::handle(self::HELP);

        if ($args['--list']) {
            self::displayGamesList();
            exit(self::EXIT_CODE_SUCCESS);
        }

        $engine = new BrainGamesEngine();
        $engine->welcome();

        $gameClassName = $gameClassName ?? self::chooseGame($args);

        try {
            $engine->start(new $gameClassName());
        } catch (Exception $e) {
            print_r($e->getMessage());
            exit(self::EXIT_CODE_GENERIC_ERROR);
        }

        exit(self::EXIT_CODE_SUCCESS);
    }

    /**
     * @noinspection ForgottenDebugOutputInspection
     */
    private static function displayGamesList(): void
    {
        $indentBeforeGameMission = 32;

        $games = null;
        /** @var Game $gameClass */
        foreach (self::AVAILABLE_GAMES as $gameName => $gameClass) {
            $indent = str_repeat(' ', $indentBeforeGameMission - strlen($gameName));
            $games = "{$games}{$gameName}{$indent}{$gameClass::getMission()}" . PHP_EOL;
        }

        print_r($games);
    }

    /**
     * @param Docopt\Response<string, string> $args
     *
     * @noinspection ForgottenDebugOutputInspection
     */
    private static function chooseGame(Docopt\Response $args): string
    {
        $gameName = $args['--random'] ? array_rand(self::AVAILABLE_GAMES) : prompt('What game do you want to play?');

        if (array_key_exists($gameName, self::AVAILABLE_GAMES)) {
            return self::AVAILABLE_GAMES[$gameName];
        }

        print_r('The game you\'ve chosen does not exist.' . PHP_EOL);
        exit(self::EXIT_CODE_GENERIC_ERROR);
    }
}
