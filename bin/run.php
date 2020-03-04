<?php

use cmoncy\kataMarkovChain\Analyser;
use cmoncy\kataMarkovChain\Infra\FileInputText;
use cmoncy\kataMarkovChain\Infra\Converter;
use cmoncy\kataMarkovChain\Infra\WordSplitter;

include_once __DIR__.'/../vendor/autoload.php';

$wordSplitter = new WordSplitter();
$analyser = new Analyser($wordSplitter);

$analysedText = $analyser(new FileInputText(implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'tests', 'histoireM6.txt'])));

$chain = Converter::createChainFromInterpretedText($analysedText);

$generator = new \cmoncy\kataMarkovChain\Generator();
$text = $generator($chain, 1000);

echo $text.PHP_EOL;
