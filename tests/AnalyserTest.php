<?php

use cmoncy\kataMarkovChain\Analyser;
use PHPUnit\Framework\TestCase;

class AnalyserTest extends TestCase
{
    /** @dataProvider getTextsToAnalyse */
    public function test analyser result(string $text, array $expectedWordsCount): void
    {
        $analyser = new Analyser($this->getWordSplitter());

        $result = $analyser($this->getInputText($text));

        $this->assertSame(count($expectedWordsCount), $result->count());
        foreach ($expectedWordsCount as $word => $expectedWordCount) {
            foreach ($expectedWordCount as $followingWord => $expectedCount) {
                $this->assertSame(
                    $expectedCount,
                    $result->getNextWordOccurrences($word, $followingWord)
                );
            }
        }
    }

    public function getTextsToAnalyse(): \Generator
    {
        yield 'empty text' => [
            '',
            [
            ],
        ];

        yield 'single word text' => [
            'word',
            [
            ],
        ];

        yield 'two words' => [
            'le chat',
            [
                'le' => [
                    'chat' => 1,
                ],
            ],
        ];

        yield 'multiple words' => [
            'le chat et le chien mangent le chien',
            [
                'le' => [
                    'chat' => 1,
                    'chien' => 2,
                ],
                'chat' => [
                    'et' => 1,
                ],
                'et' => [
                    'le' => 1,
                ],
                'chien' => [
                    'mangent' => 1,
                ],
                'mangent' => [
                    'le' => 1,
                ],
            ],
        ];
    }

    private function getWordSplitter(): Analyser\WordSplitter
    {
        return new class() implements Analyser\WordSplitter {
            public function split(Analyser\InputText $text): \Generator
            {
                yield from $text->streamCharacters();
            }
        };
    }

    private function getInputText(string $text): Analyser\InputText
    {
        return new class($text) implements Analyser\InputText {
            /**
             * @var string
             */
            private $text;

            public function __construct(string $text)
            {
                $this->text = $text;
            }

            public function streamCharacters(): \Generator
            {
                yield from explode(' ', $this->text);
            }
        };
    }
}