<?php
$post_id = 1723482;

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



$query  = sprintf("SELECT COUNT(*) FROM fishki_post WHERE id=%d;", $post_id);
$query .= sprintf("SELECT COUNT(*) FROM fishki_gallery WHERE post_id=%d;", $post_id);

/* запускаем мультизапрос */
if ($link->multi_query($query)) {
    do {
        /* получаем первый результирующий набор */
        $result = $link->store_result();

        var_dump($result->fetch_all(MYSQLI_ASSOC));

        $result->free();
    } while ($link->more_results() && $link->next_result());
}


$link->close();

