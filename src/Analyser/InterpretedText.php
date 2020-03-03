<?php

namespace cmoncy\kataMarkovChain\Analyser;

class InterpretedText
{
    /** @var int[][] */
    private $occurrences = [];

    public function addOccurrence($word, $nextWord): void
    {
        if (!isset($this->occurrences[$word][$nextWord])) {
            $this->occurrences[$word][$nextWord] = 0;
        }

        $this->occurrences[$word][$nextWord]++;
    }

    public function getOccurrences($word, $nextWords): int
    {
        return $this->occurrences[$word][$nextWords] ?? 0;
    }

    public function count(): int
    {
        return count($this->occurrences);
    }
}