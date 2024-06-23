#!/usr/bin/env php
<?php

$dom = new DOMDocument();
$dom->load($argv[1]);
$entries = [];
foreach($dom->documentElement->childNodes as $node) {
	if (! $node instanceof DOMElement) {
		continue;
	}
	$entries[] = [
		'value' => $node->getAttribute("value"),
		'type' => $node->getAttribute("type"),
	];
}

file_put_contents($argv[2], json_encode($entries));
