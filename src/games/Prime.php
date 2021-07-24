<?php

namespace BrainGames\games\Prime;

use function BrainGames\Engine\run;

const DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function isPrime($num)
{
    if ($num === 1) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function play()
{
    $runGame = function () {
        $question = rand(1, 20);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    run(DESCRIPTION, $runGame);
}
