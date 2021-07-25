<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function run(string $description, callable $runGame, int $countRound = 3): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);
    for ($i = 1; $i <= $countRound; $i++) {
        [$question, $correctAnswer] = $runGame();
        $questionMessage = line("Question: %s", $question);
        $answerUser = prompt('Your answer');
        if ($answerUser === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answerUser}' is wrong answer ;(. Correct answer was '{$correctAnswer}'. 
Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
