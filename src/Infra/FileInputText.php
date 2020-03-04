<?php

namespace cmoncy\kataMarkovChain\Infra;

use cmoncy\kataMarkovChain\Analyser\InputText;

class FileInputText implements InputText
{
    /** @var string */
    private $filePath;

    public function __construct($filePath)
    {
        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException('File not found: '.$filePath);
        }

        $this->filePath = $filePath;
    }

    public function streamCharacters(): \Generator
    {
        $pointer = fopen($this->filePath, 'r');

        $multiBytesBuffer = '';
        while (false !== ($char = fgetc($pointer))) {
            if (ord($char) < 128) {
                if ($multiBytesBuffer !== '') {
                    yield $multiBytesBuffer;
                    $multiBytesBuffer = '';
                }

                yield $char;
                continue;
            }

            $multiBytesBuffer .= $char;
        }

        if ($multiBytesBuffer !== '') {
            yield $multiBytesBuffer;
        }
    }
}