<?php
$persistent = true;

$config = [
    'dsn' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'dbname' => 'fishki',
];

/* Создание соединения */
$link = new mysqli(...array_values($config));

/* проверка соединения */
if ($link->connect_errno)
    throw new Exception("Не удалось подключиться: ".$link->connect_error.PHP_EOL);


$stmt = $link->prepare('SELECT id, post_id, gallery_id FROM fishki_pg_data LIMIT 1');

$stmt->execute();

$result = $stmt->get_result();

echo 'Query result: '. PHP_EOL;

var_dump($result->fetch_assoc());

$result->free();

$link->close();

