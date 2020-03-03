<?php

use cmoncy\kataMarkovChain\Analyser;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class AnalyserTest extends TestCase
{
    public function test constructor fails(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('File not found.');

        $analyser = new Analyser('toto');
    }

    /** @dataProvider stringProvider */
    public function testParseString(string $input, array $expected): void
    {
        $analyser = new Analyser('/home/vclaras/M6/Repositories/kronostof/kata-markov-chain/tests/histoireM6.txt');

        Assert::assertEquals($expected, $analyser->analyse());
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

//    public function testAnalyseNoFile(): void
//    {
//        $analyser = new Analyser();
//        Assert::assertTrue($analyser->analyseFile('/usr/local/var/www/kata-markov-chain/tests/histoireM6.txt'));
//    }
}
