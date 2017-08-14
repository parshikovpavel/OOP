<?php
//Включение в генератор внутреннего генератора через yield from
function generator()
{
	yield 1;
	yield from inner();
	yield 3;
}

function inner()
{
	yield 2;
}

foreach(generator() as $number) {
	echo "$number\n";
}
