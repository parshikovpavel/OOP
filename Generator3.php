<?php
//Пример генератора, обменивающегося значением по ссылке
//через переменную channel, как через канал
function &square()
{
	$counter = 0;
	$channel = 0;
	
	for($counter = 0; $counter<5; $counter++) {
		echo "counter=$counter\n";
		$channel = $channel*$channel;
		yield $channel;
	}
}

$number = 0;
foreach(square() as &$channel) {
	echo "$number*$number=$channel\n";
	$number = rand(0,100);
	$channel = $number;
}
