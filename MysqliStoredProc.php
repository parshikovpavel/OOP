<?php
$persistent = true;

$config = [
    'dsn' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'dbname' => 'test',
];

/* Создание соединения */
$link = new mysqli(...array_values($config));

/* проверка соединения */
if ($link->connect_errno)
    throw new Exception("Не удалось подключиться: ".$link->connect_error.PHP_EOL);


$result = $link->query('CALL proc_in(100)', MYSQLI_STORE_RESULT);

var_dump($result->fetch_row());

$result->free();

$link->next_result();

if(!$link->query("SET @str = 'Username'"))
    throw new Exception("Ошибка выполнения запроса: ".($link->error).PHP_EOL);;

if(!$link->query("CALL proc_inout(@str)"))
    throw new Exception("Ошибка выполнения запроса: ".($link->error).PHP_EOL);

if(!($result = $link->query("SELECT @str", MYSQLI_STORE_RESULT)))
    throw new Exception("Ошибка выполнения запроса: ".($link->error).PHP_EOL);

var_dump($result->fetch_row());

$link->close();

