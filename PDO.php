<?php
$config = array(
    'dsn' => 'mysql:host=localhost;dbname=test',
    'username' => 'root',
    'password' => 'root',
    'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);
$comment_id = 1;

try {
    $pdo = new PDO(...array_values($config));

    $sth = $pdo->prepare("INSERT INTO log (comment_id) VALUES(:comment_id)");
    $sth->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
    $sth->execute();
}
catch(PDOException $e) {
    echo 'Error: '.$e->getMessage();
}



