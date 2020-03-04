<?php


use cmoncy\kataMarkovChain\Analyser\InputText;
use cmoncy\kataMarkovChain\Infra\WordSplitter;
use PHPUnit\Framework\TestCase;

class WordSplitterTest extends TestCase
{
    /** @dataProvider getTextsToTest */
    public function test split(InputText $inputText, string ...$expectedWords): void
    {
        $wordSplitter = new WordSplitter();

        $this->assertSame(
            $expectedWords,
            iterator_to_array(
                $wordSplitter->split($inputText)
            )
        );
    }

    public function getTextsToTest(): \Generator
    {
        yield 'empty string' => [
            $this->getInputText(''),
            // No characters.
        ];

        yield 'single word character' => [
            $this->getInputText('a'),
            'a',
        ];

        yield 'single non word character' => [
            $this->getInputText(','),
            ',',
        ];

        yield 'single space' => [
            $this->getInputText(' '),
            ' ',
        ];

        yield 'sentence' => [
            $this->getInputText('Le chat et le chien, quoi ?! J\'y crois pas…'),
            'Le',
            ' ',
            'chat',
            ' ',
            'et',
            ' ',
            'le',
            ' ',
            'chien',
            ',',
            ' ',
            'quoi',
            ' ',
            '?',
            '!',
            ' ',
            'J',
            '\'',
            'y',
            ' ',
            'crois',
            ' ',
            'pas',
            '…',
        ];
    }

    private function getInputText(string $text): InputText
    {
        return new class($text) implements InputText {
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
                yield from mb_str_split($this->text);
            }
        };
    }
}