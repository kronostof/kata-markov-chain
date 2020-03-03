<?php

namespace cmoncy\kataMarkovChain;

class Analyser
{
    /**
     * @var string
     */
    private $file;

    public function __construct(string $file)
    {
        if (!file_exists($file)) {
            throw new \InvalidArgumentException('File not found.');
        }
        $this->file = $file;
    }

    public function analyse(): array
    {
        $result = [];
        $lastWord = null;
        foreach (explode(' ', file_get_contents($this->file)) as $word) {
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

//    public function analyseFile(string $text): bool
//    {
//        if (file_exists($text)) {
//            return true;
//        }
//        return false;
//    }
}