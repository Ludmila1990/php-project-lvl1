<?php

namespace BrainGames\games\Even;

use function BrainGames\Engine\run;

const DESCRIPTION = "Answer 'yes' if the number is even, otherwise answer 'no'.";

function isEven($num)
{
    return $num % 2 === 0;
}

function play()
{
    $runGame = function () {
        $question = rand(1, 20);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    run(DESCRIPTION, $runGame);
}
