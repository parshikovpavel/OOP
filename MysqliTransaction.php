<?php
$sum = 100;
$debit_account = '51';
$credit_account = '60';

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

$link->begin_transaction();

$link->query(sprintf("UPDATE account SET value=value+%d WHERE num='%s'", $sum, $debit_account));

$link->query(sprintf("UPDATE account SET value=value-%d WHERE num='%s'", $sum, $credit_account));

$link->rollback();

$link->close();

