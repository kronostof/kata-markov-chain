<?php


namespace cmoncy\kataMarkovChain\Infra;


use cmoncy\kataMarkovChain\Analyser\InterpretedText;
use cmoncy\kataMarkovChain\Generator\Chain;
use cmoncy\kataMarkovChain\Generator\Word;

class Converter
{
    /** @var Word[] */
    private $cachedWords = [];

    private function __construct()
    {
    }

    public static function createChainFromInterpretedText(InterpretedText $interpretedText): Chain
    {
        return (new self())->convert($interpretedText);
    }

    private function convert(InterpretedText $interpretedText)
    {
        foreach ($interpretedText->getWords() as $text) {
            foreach ($interpretedText->getNextWordsOccurrences($text) as $nextText => $numberOfOccurrences) {
                $this->getWord($text)->getChain()->addWord(
                    $this->getWord($nextText),
                    $numberOfOccurrences
                );
            }
        }

        $chain = new Chain();
        foreach ($this->cachedWords as $word) {
            $chain->addWord($word, $interpretedText->getOccurrences($word->getText()));
        }

        return $chain;
    }

    private function getWord(string $text): Word
    {
        if (!array_key_exists($text, $this->cachedWords)) {
            $this->cachedWords[$text] = new Word($text);
        }

        return $this->cachedWords[$text];
    }
}