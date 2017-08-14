<?php
//Использование генератора совместно с IteratorAggregate
class myArrayObject implements IteratorAggregate
{
	private $data = [];
	
	public function __construct($data) 
	{
		$this->data = $data;
	}
	
	public function getIterator() {
		foreach($this->data as $key => $value) {
			yield $key => $value;
		}
	}
}


foreach(new myArrayObject([1,2,3]) as $key => $value) {
	echo "$key=>$value\n";
}