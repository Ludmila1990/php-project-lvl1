<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function greet()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}

function checkParity()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $i = 1;
    $res = [];
    while ($i <= 3) {
        $num = rand(1, 20);
        $question = line("Question: %s", $num);
        $answer = prompt('Your answer');
        if ($num % 2 === 0 && $answer === 'yes' || $num % 2 !== 0 && $answer === 'no') {
            line('Correct!');
            $i++;
            $res[] = $answer;
        } elseif ($num % 2 === 0) {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.
Let's try again, {$name}!");
            break;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.
Let's try again, {$name}!");
            break;
        }
        if (count($res) === 3) {
            line("Congratulations, {$name}!");
        }
    }
}
