<?php
//Возврат значения из функции-генератора через yield from
function outer_generator()
{
    yield 1;
    return yield from inner_generator();
}

function inner_generator()
{
    yield 2;

}

$gen = outer_generator();
foreach($gen as $num)
{
    echo "$num ";
}
var_dump($gen->getReturn());