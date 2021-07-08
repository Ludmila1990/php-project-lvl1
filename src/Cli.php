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

function calculate()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');
    
    $i = 1;
    $res = [];
    while ($i <= 3) {   
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $operations = ['+', '-', '*'];
        $operator = $operations[array_rand($operations, 1)];
        $expression = "{$num1} {$operator} {$num2}";
        $question = line('Question: %s', $expression);
        $answer = prompt('Your answer');
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
        }
        if ((int) $answer === $result) {
        line('Correct!'); 
        $i++;
        $res[] = $answer;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.
Let's try again, {$name}!");
            break;
        }
        if (count($res) === 3) {
            line("Congratulations, {$name}!");
        }
    }
}

