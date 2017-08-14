<?php
function gen()
{
	$a = 1;
	yield $a;
}


for($i=0;$i<100;$i++) {
	
	die(var_dump(each(gen())));
	[$key, $value] = each(gen());
	echo "$key=>$value";
}

