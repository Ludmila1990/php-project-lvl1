<?php

namespace BrainGames\games\Gcd;

use function BrainGames\Engine\run;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function findGcd($a, $b)
{
    $large = $a > $b ? $a : $b;
    $small = $a > $b ? $b : $a;
    $remainder = $large % $small;
    return $remainder == 0 ? $small : findGcd($small, $remainder);
}

function play()
{
    $runGame = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $question = "{$num1} {$num2}";
        $correctAnswer = findGcd($num1, $num2);
        return [$question, (string) $correctAnswer];
    };
    run(DESCRIPTION, $runGame);
}
