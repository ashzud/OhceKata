<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\Ohce;
use PHPUnit\Framework\TestCase;

final class OhceTest extends TestCase
{
    /**
     * @test
     */
    public function checkRegularWord()
    {
        $ohce = new Ohce();

        $result = $ohce->getAnswer("Hola");

        $this->assertEquals("aloH", $result["ReversedText"]);
        $this->assertEquals("", $result["Comment"]);
    }

    /**
     * @test
     */
    public function checkPalyndrome()
    {
        $ohce = new Ohce();

        $result = $ohce->getAnswer("ala");

        $this->assertEquals("ala", $result["ReversedText"]);
        $this->assertEquals("¡Bonita palabra!", $result["Comment"]);
    }
}
