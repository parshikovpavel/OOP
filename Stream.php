<?php
function std()
{
    $stdin = fopen("php://stdin", "r");
    $line1 = fgets($stdin);
    $line2 = fgets($stdin);
    fclose($stdin);

    $line3 = fgets(STDIN);

    $stdout = fopen("php://stdout", "w");
    fputs($stdout, $line1);
    fputs($stdout, $line2);
    fclose($stdout);

    fputs(STDOUT, $line3);
}

function input()
{
    $input = fopen("php://input", "r");
    $line = fgets($input);
    fclose($input);

    echo $line;
}

function output()
{
    $output = fopen("php://output", "w");

    fputs($output, "123");
    fclose($output);
}

$fp = fopen('php://memory', "rw+");
fputs($fp, "hello,");
fputs($fp, " world.");
rewind($fp);
echo fgets($fp);
echo fgets($fp);
fclose($fp);

