<?php
$persistent = true;

$config = [
    'host' => 'p:localhost',
    'username' => 'root',
    'password' => 'root',
    'dbname' => 'fishki',
];

/* Создание соединения */
$link = new mysqli(...array_values($config));

/* проверка соединения */
if ($link->connect_errno)
    throw new Exception("Не удалось подключиться: ".$link->connect_error.PHP_EOL);


if(!($result = $link->query('SELECT CONNECTION_ID()')))
    throw new Exception("Ошибка выполнения запроса: ".($link->error).PHP_EOL);


echo 'Connection ID: '.$result->fetch_row()[0]. PHP_EOL;

$result->free();

$link->close();

