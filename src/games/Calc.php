<?php

namespace BrainGames\games\Calc;

use function BrainGames\Engine\run;

const DESCRIPTION = "What is the result of the expression?";

function play(): void
{
    $runGame = function (): array {
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $operations = ['+', '-', '*'];
        $operator = $operations[array_rand($operations, 1)];
        $question = "{$num1} {$operator} {$num2}";
        $correctAnswer = 0;
        switch ($operator) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
        }
        return [$question, (string) $correctAnswer];
    };
    run(DESCRIPTION, $runGame);
}
