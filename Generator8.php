<?php
//Возврат значения из функции-генератора PHP7+
function arg_iterator()
{
    global $argv;
    for($i = 1; $i<count($argv);$i++)
    {
        yield $argv[$i];
    }
    return $i-1; //Return the count of arguments
}

$generator = arg_iterator();
foreach($generator as $arg_value) {
	echo "$arg_value\n";
}
echo "Count arguments: {$generator->getReturn()}";