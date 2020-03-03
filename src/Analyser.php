<?php

namespace cmoncy\kataMarkovChain;

use cmoncy\kataMarkovChain\Analyser\InputText;
use cmoncy\kataMarkovChain\Analyser\InterpretedText;
use cmoncy\kataMarkovChain\Analyser\WordSplitter;

class Analyser
{
    /**
     * @var WordSplitter
     */
    private $splitter;

    public function __construct(WordSplitter $splitter)
    {
        $this->splitter = $splitter;
    }

    public function __invoke(InputText $text): InterpretedText
    {
        $interpretedText = new InterpretedText();

        $wordsGenerator = $this->splitter->split($text);
        $previousWord = $wordsGenerator->current();
        $wordsGenerator->next();
        while ($wordsGenerator->valid()) {
            $word = $wordsGenerator->current();
            $interpretedText->addOccurrence($previousWord, $word);
            $wordsGenerator->next();
            $previousWord = $word;
        }

        return $interpretedText;
    }

}