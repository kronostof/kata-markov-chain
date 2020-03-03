<?php

namespace cmoncy\kataMarkovChain;

class Analyser
{
    public function analyse(string $string): array
    {
        $result = [];
        $lastWord = null;
        foreach (explode(' ', $string) as $word) {
            if ($lastWord === null) {
                $lastWord = $word;
                continue;
            }

            if (isset($result[$lastWord][$word])) {
                $result[$lastWord][$word]++;
            } else {
                $result[$lastWord][$word] = 1;
            }

            $lastWord = $word;
        }

        return $result;
    }

    public function analyseFile()
    {

    }
}