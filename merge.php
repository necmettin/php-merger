<?php

require_once __DIR__ . "/settings.php";
require_once __DIR__ . '/vendor/autoload.php';

use PhpParser\Error;
use PhpParser\NodeDumper;
use PhpParser\ParserFactory;

$files = [$sourceFile];
$filelist = [];
$factory = new ParserFactory();
$parser = $factory->create(ParserFactory::PREFER_PHP7);
$dumper = new NodeDumper;

echo 1;

while ($files) {
	$file = array_shift($files);
	$contents = file_get_contents($file);
	try {
		$ast = $parser->parse($contents);
		echo $dumper->dump($ast) . "\n";
	} catch (Error $error) {
		echo "Parse error: {$error->getMessage()}\n";
		die();
	}
	
}
