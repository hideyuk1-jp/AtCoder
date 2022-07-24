<?php

fscanf(STDIN, '%d %d %d', $n, $m, $t);
$_n = $n;
$now = 0;
$flag = 1;
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $_n -= $a - $now;
    $flag &= $_n > 0;
    $_n += $b - $a;
    $_n = min($_n, $n);
    $now = $b;
}
$_n -= $t - $now;
$flag &= $_n > 0;
echo $flag ? "Yes" : "No";
