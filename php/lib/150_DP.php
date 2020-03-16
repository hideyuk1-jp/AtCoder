<?php
define("MOD", 10 ** 9 + 7);

# 入力
fscanf(STDIN, '%s', $s);
$s = strrev($s);
$n = strlen($s);

$dp[0] = array_fill(0, 13, 0);
$dp[0][0] = 1;
$mul = 1;
for ($i = 0; $i < $n; $i++) {
    $dp[$i + 1] = array_fill(0, 13, 0);
    if ($s[$i] === '?') {
        for ($j = 0; $j < 10; $j++) {
            $diff = $mul * $j;
            for ($k = 0; $k < 13; $k++) {
                $dp[$i + 1][($diff + $k) % 13] += $dp[$i][$k];
            }
        }
    } else {
        $j = (int)$s[$i];
        $diff = $mul * $j;
        for ($k = 0; $k < 13; $k++) {
            $dp[$i + 1][($diff + $k) % 13] = $dp[$i][$k];
        }
    }
    for($k = 0; $k < 13; $k++) {
        $dp[$i + 1][$k] %= MOD;
    }
    $mul *= 10;
    $mul %= 13;
}
echo $dp[$n][5].PHP_EOL;