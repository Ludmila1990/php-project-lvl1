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

function gcd($a, $b)
{
    $large = $a > $b ? $a : $b;
    $small = $a > $b ? $b : $a;
    $remainder = $large % $small;
    return $remainder == 0 ? $small : gcd($small, $remainder);
}

function findGcd()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.'); 
    $i = 1;
    $res = [];
    while ($i <= 3) {   
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $outputNumbers = "{$num1} {$num2}";
        $question = line('Question: %s', $outputNumbers);
        $answer = prompt('Your answer');
        $correctAnswer = (string) gcd($num1, $num2);
        if ($answer === $correctAnswer) {
            line('Correct!'); 
            $i++;
            $res[] = $answer;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!");
            break;
        }
        if (count($res) === 3) {
            line("Congratulations, {$name}!");
        }
        }
}

function progression($num) {
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
      }else {
        $result[] = $value;
      }
    }
   $string = implode(' ', $result);
   return [$string, $findValue];
}

function getTheProgression()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What number is missing in the progression?');
    $i = 1;
    $res = [];
    while ($i <= 3) {
        $progression = progression(rand(1, 100));
        $outputProgression = $progression[0];
        $correctAnswer = (string) $progression[1];
        $question = line('Question: %s', $outputProgression);
        $answerUser = prompt('Your answer');
        if ($answerUser === $correctAnswer) {
            line('Correct!'); 
            $i++;
            $res[] = $answerUser;
        } else {
            line("'{$answerUser}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!");
            break;
        }
        if (count($res) === 3) {
            line("Congratulations, {$name}!");
        }
}

}

function isPrime($num) {
    for ($i = 2; $i < $num; $i++) {
      if ($num % $i === 0) {
        return false;
      } 
    }
    return true;
}

function checkPrime()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $i = 1;
    $res = [];
    while ($i <= 3) {
        $num = rand(1, 20);
        $question = line("Question: %s", $num);
        $answerUser = prompt('Your answer');
        $correctAnswer = isPrime($num) ? 'yes' : 'no';
        if ($answerUser === $correctAnswer) {
            line('Correct!'); 
            $i++;
            $res[] = $answerUser;
        } else {
            line("'{$answerUser}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
Let's try again, {$name}!");
            break;
        }
        if (count($res) === 3) {
            line("Congratulations, {$name}!");
        }
    }
}
