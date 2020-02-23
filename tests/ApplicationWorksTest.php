<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Services\PokerStairValidatorService;

final class ApplicationWorksTest extends TestCase
{
    private $pokerStairValidatorService;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->pokerStairValidatorService = new PokerStairValidatorService();
    }

    /**
     * This assertion it's only for check that phpunit is working
     */
    public function testSimpleAssertion(): void
    {
        $this->assertTrue(true);
    }

    public function testDafitiAlgorithm() {
        //$results1 = $this->isStraight([2, 3, 4 ,5, 6]);
        $results2 = $this->isStraight([14, 5, 4 ,2, 3]);
        //$results3 = $this->isStraight([7, 7, 12 ,11, 3, 4, 14]);
        //$results4 = $this->isStraight([7, 3, 2]);

        //$this->assertEquals(true, $results1, "2, 3, 4 ,5, 6");
        $this->assertEquals(true, $results2, "14, 5, 4 ,2, 3");
        //$this->assertEquals(false, $results3, "7, 7, 12 ,11, 3, 4, 14");
        //$this->assertEquals(false, $results4,"7, 3, 2");
    }

    public function isStraight(array $cards)
    {
        $command = new \Commands\PokerStairValidatorCommand();
        $context = new \Commands\Contracts\Context($command);
        return $context->getStrategy()->execute($cards);
    }
}
