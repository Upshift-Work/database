<?php

use BrekiTomasson\PhpCsFixer\Config\Exceptions\InvalidPhpVersion;
use BrekiTomasson\PhpCsFixer\Config\RuleSet\Php8;
use BrekiTomasson\PhpCsFixer\Config\Factory;

require __DIR__ . '/vendor/autoload.php';

try {
    $config = Factory::fromRuleSet(new Php8());
} catch (InvalidPhpVersion $exception) {
    echo $exception->getMessage();
    exit(1);
}

$finder = PhpCsFixer\Finder::create()
    ->ignoreDotFiles(false)
    ->ignoreVCSIgnored(true)
    ->in(__DIR__ . '/src');

return $config->setFinder($finder);
