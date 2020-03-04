<?php

namespace cmoncy\kataMarkovChain\Generator;

class Word
{
    /** @var string */
    private $word;

    /** @var Chain */
    private $chain;

    public function __construct(string $word)
    {
        $this->word = $word;
        $this->chain = new Chain();
    }

    public function getText(): string
    {
        return $this->word;
    }

    public function getChain(): Chain
    {
        return $this->chain;
    }
}