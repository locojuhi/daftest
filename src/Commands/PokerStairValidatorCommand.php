<?php
declare(strict_types = 1);

namespace Commands;

use Commands\Contracts\CommandStrategyInterface;
use Services\PokerStairValidatorService;


class PokerStairValidatorCommand implements CommandStrategyInterface
{
    /**
     * @var PokerStairValidatorService
     */
    private $pokerStairValidatorService;

    /**
     * PokerStairValidatorCommand constructor.
     */
    public function __construct()
    {
        $this->pokerStairValidatorService = new PokerStairValidatorService();
    }

    /**
     * @param array $cards
     * @return bool
     */
    public function execute(array $cards) : bool
    {
        switch (true) {
            case in_array(1, $cards) && !in_array(14, $cards):
                $cards[] = 14;
                break;
            case in_array(14, $cards) && !in_array(1, $cards):
                $cards[] = 1;
                break;
        }

        sort($cards);

        switch ($this->pokerStairValidatorService->isCardListStraight(array_unique($cards))) {
            case true:
                echo 'Card is straight' . PHP_EOL;
                return true;
                break;
            case false:
                echo 'Card is NOT straight' . PHP_EOL;
                return false;
                break;
        }
    }
}
