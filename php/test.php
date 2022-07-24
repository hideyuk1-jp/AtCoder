<?php

// PHPのmax遅い問題
$n = 10 ** 7;

// 1
$times = [];
for ($c = 0; $c < 10; ++$c) {
    $start = microtime(true);
    $max = 0;
    for ($i = 0; $i < $n; ++$i) {
        $max = max($max, $i + 1);
    }
    $end = microtime(true);
    $times[] = $end - $start;
}
echo '1 time: ', array_sum($times) / count($times), PHP_EOL;

// 2
$times = [];
for ($c = 0; $c < 10; ++$c) {
    $start = microtime(true);
    $max = 0;
    for ($i = 0; $i < $n; ++$i) {
        if ($i + 1 > $max) {
            $max = $i + 1;
        }
    }
    $end = microtime(true);
    $times[] = $end - $start;
}
echo '2 time: ', array_sum($times) / count($times), PHP_EOL;
