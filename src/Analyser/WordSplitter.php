<?php

namespace cmoncy\kataMarkovChain\Analyser;

interface WordSplitter
{
    public function split(InputText $text): \Generator;
}