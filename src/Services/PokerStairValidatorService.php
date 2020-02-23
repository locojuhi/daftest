<?php
declare(strict_types = 1);

namespace Services;


class PokerStairValidatorService
{
    const REPLACEMENT_NUMBER = [14, 1];

    /**
     * @var \SplDoublyLinkedList
     */
    private $cardList;

    /**
     * PokerStairValidatorService constructor.
     */
    public function __construct()
    {
        $this->cardList = new \SplDoublyLinkedList();
    }

    /**
     * @param array $cards
     * @return bool
     */
    public function isCardListStraight(array $cards) : bool
    {
        foreach ($cards as $card) {
            $this->cardList->push($card);
        }

        $cardCounter = 0;
        for ($this->cardList->rewind(); $this->cardList->valid(); $this->cardList->next()) {
            if ($this->isPreviousPlusOneSameThatCurrent()) {
                $cardCounter = ++$cardCounter;
            }
        }

        return $cardCounter >= 5;
    }

    /**
     * @return bool
     */
    public function isPreviousPlusOneSameThatCurrent()
    {
        if ($this->cardList->top() == $this->cardList->current()) {
            $this->cardList->prev();
            $previousValue = $this->cardList->current();
            $this->cardList->next();
            $result =  $this->cardList->current() - $previousValue;
        } else {
            $this->cardList->next();
            $nextValue = $this->cardList->current();
            $this->cardList->prev();
            $result = $nextValue - $this->cardList->current();
        }

        return $result == 1;
    }
}