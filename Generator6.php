<?php
//Отправка данных в генератор с помощью ->send()
function square()
{
	$number = yield;
	while(1) {
		$number = yield $number*$number;
	}
}

for($i=0;$i<10;$i++)
{
	$number = rand(0,100);
	$square = square()->send($number);
	echo "$number*$number=$square\n";
}