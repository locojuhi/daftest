<?php

namespace Commands\Contracts;


interface CommandStrategyInterface
{
    /**
     * Method that will execute every command
     * @param array $cards
     * @return mixed
     */
    public function execute(array $cards);
}