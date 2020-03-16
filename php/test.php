<?php
$time = microtime(true);

$s = '';
$n = 10 ** 5;
for ($i = 0; $i < $n; $i++) {
    $s = 'a' . $s;
}
echo (microtime(true) - $time) . PHP_EOL;

$time = microtime(true);

$s = $left = '';
$n = 10 ** 5;
for ($i = 0; $i < $n; $i++) {
    $left .= strrev('a');
}
$s = strrev($left) . $s;
echo (microtime(true) - $time) . PHP_EOL;
