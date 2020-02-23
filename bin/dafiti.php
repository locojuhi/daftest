<?php
require __DIR__ . '/../vendor/autoload.php';


$scriptArguments = $argv;

array_shift($scriptArguments);

$command = new \Commands\PokerStairValidatorCommand();
$context = new \Commands\Contracts\Context($command);
$context->getStrategy()->execute($scriptArguments);

//print_r($scriptArguments);