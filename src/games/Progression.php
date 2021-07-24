<?php

namespace BrainGames\games\Progression;

use function BrainGames\Engine\run;

const DESCRIPTION = "What number is missing in the progression?";

function getTheProgression(int $num): array
{
    $step = rand(1, 10);
    $res = [];
    $endNum = $num + 9 * $step;
    for ($i = $num; $i <= $endNum; $i += $step) {
        $res[] = $i;
    }
    $keyRand = rand(0, 9);
    $newValue = '..';
    $result = [];
    $findValue = '';
    foreach ($res as $key => $value) {
        if ($key === $keyRand) {
            $findValue = $res[$key];
            $result[$key] = $newValue;
        } else {
            $result[] = $value;
        }
    }
    $string = implode(' ', $result);
    return [$string, $findValue];
}

function play()
{
    $runGame = function (): array {
        $progression = getTheProgression(rand(1, 100));
        $question = $progression[0];
        $correctAnswer = (string) $progression[1];
        return [$question, $correctAnswer];
    };
    run(DESCRIPTION, $runGame);
}
