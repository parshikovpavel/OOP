<?php
function mrange($start,$end) 
{
	for($i = $start;$i<$end; $i++) {
		yield $i;
	}
}

$generator = mrange(10,20);

foreach($generator as $number) {
	echo $number."\n";
}