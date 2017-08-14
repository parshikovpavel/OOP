<?php
$str=<<<'STR'
Vasya-Vasya Ivanov
Petya-Petya Petrov
Kolya-Kolya Sidorov
STR;

function peoples()
{
	global $str;
	$lines = explode("\n", $str);
	foreach($lines as $line) {
		$elem = explode('-',$line);
		yield $elem[0] => $elem[1];
	}
}

foreach(peoples() as $name => $full_name) {
	echo "$name=>$full_name\n";
}