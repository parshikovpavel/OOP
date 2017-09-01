<?php
$func = function($inc = 1) {
    return $this->value += $inc;
};

class A
{
    private $value = 0;
}

$a = new A;

$func_bind = $func->bindTo($a, $a);

var_dump($func_bind());
var_dump($func_bind());
var_dump($func_bind());


$func_bind = Closure::bind($func,$a, $a);

var_dump($func_bind());
var_dump($func_bind());
var_dump($func_bind());

var_dump($func->call($a,2));
var_dump($func->call($a,2));
var_dump($func->call($a,2));


