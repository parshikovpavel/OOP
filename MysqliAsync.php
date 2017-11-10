<?php
$config = [
    'dsn' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'dbname' => 'test',
];

$links = $queries = $results = [];

for ($i = 1; $i <= 3; $i++) {
    $links[$i] = new mysqli(...array_values($config));
    $queries[$i] = 'SELECT ' . $i . ' AS val, SLEEP(' . $i . ') as sleep';
}

echo 'Start executing queries synchronously...' . PHP_EOL;

$start = microtime(true);
for ($i = 1; $i <= 3; $i++) {
    $result = $links[$i]->query($queries[$i]);
    while($row = $result->fetch_assoc()) {
        $results[] = $row['val'];
    }
}
$stop = microtime(true);

echo 'Results: ' . PHP_EOL;
print_r($results);
echo 'Sync execution time (seconds): ' . ($stop - $start) . PHP_EOL;


$results = [];
echo 'Start executing queries asynchronously...' . PHP_EOL;

$start = microtime(true);
for ($i = 1; $i <= 3; $i++) {
    $links[$i]->query($queries[$i], MYSQLI_ASYNC);
}

do {
    $read = $error = $reject = [];
    foreach($links as $link)
        $read[] = $error[] = $reject[] = $link;

    if (!mysqli_poll($read, $errors, $reject, 0, 500)) {
        continue;
    }

    foreach($links as $id => $link) {
        if ($result = $link->reap_async_query()) {
            while($row = $result->fetch_assoc()) {
                $results[] = $row['val'];
            }
            $result->free_result();
            unset($links[$id]);
        }
    }
} while(count($links) > 0);
$stop = microtime(true);
echo 'Results: ' . PHP_EOL;
print_r($results);
echo 'Async execution time (seconds): ' . ($stop - $start) . PHP_EOL;