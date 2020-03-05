<?php

namespace cmoncy\kataMarkovChain\Generator;

class Chain
{
    /** @var Word[] */
    public $words = [];

    public function addWord(Word $word, int $weight): void
    {
        for ($i = 0; $i < $weight; $i++) {
            $this->words[] = $word;
        }
    }

    public function pick(Randomizer $randomizer): ?Word
    {
        return $randomizer->pickOne($this->words);
    }
}