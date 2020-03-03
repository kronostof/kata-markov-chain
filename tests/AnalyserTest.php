<?php

use cmoncy\kataMarkovChain\Analyser;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class AnalyserTest extends TestCase
{
    public function testMy(): void
    {
        $analyser = new Analyser();
        Assert::assertEquals(1,1);
    }

    public function testIHaveAText($variable): bool
    {
        return isset($variable) === true ? false : true;
    }
}
