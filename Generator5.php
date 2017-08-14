<?php
//Генератор для перебора строк файла
function file_gets()
{
	try {
		if(false===($handle = fopen(__DIR__."\Generator4.php", "rt")))
			throw new Exception('Error when opening file');
	
		while(false!==($line = fgets($handle))) {
			yield $line;
		}
	}
	finally {
		fclose($handle);
	}
}

foreach(file_gets() as $line) {
	echo "$line\n";
}
