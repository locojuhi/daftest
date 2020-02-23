<?php
/**
 * Created by PhpStorm.
 * User: danny
 * Date: 21/02/2020
 * Time: 8:15
 */

namespace Commands\Contracts;


class Context {

    /**
     * @var CommandStrategyInterface
     */
    private $strategy;

    /**
     * Context constructor.
     * @param CommandStrategyInterface $commandStrategy
     */
    public function __construct(CommandStrategyInterface $commandStrategy)
    {
        $this->strategy = $commandStrategy;
    }

    /**
     * @return CommandStrategyInterface
     */
    public function getStrategy(): CommandStrategyInterface
    {
        return $this->strategy;
    }
}
