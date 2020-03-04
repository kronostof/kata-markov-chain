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

    public function pick(): ?Word
    {
        if (count($this->words) === 0) {
            return null;
        }

        return $this->words[mt_rand(0, count($this->words) - 1)];
    }
}