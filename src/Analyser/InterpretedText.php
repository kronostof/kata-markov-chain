<?php

namespace cmoncy\kataMarkovChain\Analyser;

class InterpretedText
{
    /** @var int[][] */
    private $occurrences = [];
    /** @var int[] */
    private $totalOccurrencesByWords = [];

    public function addOccurrence($word, $nextWord): void
    {
        if (!isset($this->occurrences[$word][$nextWord])) {
            $this->occurrences[$word][$nextWord] = 0;
        }

        $this->occurrences[$word][$nextWord]++;
        $this->totalOccurrencesByWords[$nextWord] = ($this->totalOccurrencesByWords[$nextWord] ?? 0) + 1;
    }

    public function getWords(): array
    {
        return array_keys($this->occurrences);
    }

    public function getNextWordsOccurrences(string $word): array
    {
        return $this->occurrences[$word] ?? [];
    }

    public function getOccurrences(string $word): int
    {
        return $this->totalOccurrencesByWords[$word] ?? 0;
    }

    public function count(): int
    {
        return count($this->occurrences);
    }
}