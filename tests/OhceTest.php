<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\DateManager;
use Deg540\PHPTestingBoilerplate\Ohce;
use PHPUnit\Framework\TestCase;
use Mockery;

final class OhceTest extends TestCase
{
    private DateManager $dateManager;
    private Ohce $ohce;

    protected function setUp():void
    {
        parent::setUp();
        $this->dateManager = Mockery::mock(DateManager::class);
        $this->ohce = new Ohce($this->dateManager);
    }
    /**
     * @test
     */
    public function checkRegularWord()
    {

        $result = $this->ohce->getAnswer("Hola");

        $this->assertEquals("aloH", $result["ReversedText"]);
        $this->assertEquals("", $result["Comment"]);
    }

    /**
     * @test
     */
    public function checkPalyndrome()
    {

        $result = $this->ohce->getAnswer("ala");

        $this->assertEquals("ala", $result["ReversedText"]);
        $this->assertEquals("¡Bonita palabra!", $result["Comment"]);
    }

    /**
     * @test
     */
    public function checkFinishMessage()
    {

        $result = $this->ohce->getAnswer("Stop!");

        $this->assertEquals("", $result["ReversedText"]);
        $this->assertEquals("Adios <your name>", $result["Comment"]);
    }

    /**
     * @test
     */
    public function checkMorningGreeting()
    {
        $this->dateManager->allows()->getCurrentHour()->andReturns(8);

        $result = $this->ohce->getAnswer("ohce Asier");

        $this->assertEquals("¡Buenos días Asier!", $result["Comment"]);
    }

    /**
     * @test
     */
    public function checkAfternoonGreeting()
    {
        $this->dateManager->allows()->getCurrentHour()->andReturns(15);

        $result = $this->ohce->getAnswer("ohce Asier");

        $this->assertEquals("¡Buenas tardes Asier!", $result["Comment"]);
    }

    /**
     * @test
     */
    public function checkNightGreeting()
    {
        $this->dateManager->allows()->getCurrentHour()->andReturns(2);

        $result = $this->ohce->getAnswer("ohce Asier");

        $this->assertEquals("¡Buenas noches Asier!", $result["Comment"]);
    }
}
