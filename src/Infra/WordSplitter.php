<?php

namespace cmoncy\kataMarkovChain\Infra;

use cmoncy\kataMarkovChain\Analyser\InputText;

class WordSplitter implements \cmoncy\kataMarkovChain\Analyser\WordSplitter
{
    public function split(InputText $text): \Generator
    {
        $buffer = '';

        foreach ($text->streamCharacters() as $char) {
            $match = preg_match('#\w#u', $char);

            if ($match) {
                $buffer .= $char;
                continue;
            }

            if ($buffer !== '') {
                yield $buffer;
                $buffer = '';
            }

            yield $char;
        }

        if ($buffer !== '') {
            yield $buffer;
        }
    }
}