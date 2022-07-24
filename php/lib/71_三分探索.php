<?php

// 三分探索　極大値や極小値を見つける
$p = (float)trim(fgets(STDIN));
$l = 0;
$r = 100;
while (abs($r - $l) > 10 ** (-5)) {
    $ld = $l + abs($r - $l) / 3;
    $rd = $r - abs($r - $l) / 3;
    if (f($ld) > f($rd)) {
        $l = $ld;
    } else {
        $r = $rd;
    }
}
echo f($l), PHP_EOL;
function f($x)
{
    global $p;
    return $x + $p * (2 ** (-$x / 1.5));
}
