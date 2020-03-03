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

    /** @dataProvider stringProvider */
    public function testParseString(string $input, array $expected): void
    {
        $analyser = new Analyser();

        Assert::assertEquals($expected, $analyser->analyse($input));
    }

    public function stringProvider(): Generator
    {
        yield [
            '',
            []
        ];

        yield [
            'Coucou chat',
            ['Coucou' => ['chat' => 1]]
        ];

        yield [
            'coucou le chat coucou le chien',
            [
                'coucou' => [
                    'le' => 2,
                ],
                'le' => [
                    'chat' => 1,
                    'chien' => 1
                ],
                'chat' => [
                    'coucou' => 1
                ]
            ]
        ];
    }

    public function testAnalyseNoFile(): void
    {
        $analyser = new Analyser();
        $analyser->analyseFile();
    }
}
