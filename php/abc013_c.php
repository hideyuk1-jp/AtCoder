<?php

list($n, $h) = ints();
list($a, $b, $c, $d, $e) = ints();
$cost = PHP_INT_MAX;
for ($i = 0; $i <= $n; ++$i) {
    if ($h + $i * $b > ($n - $i) * $e) {
        $cost = min($cost, $i * $a);
        break;
    }
    $ok = $n - $i + 1;
    $ng = -1;
    while (abs($ok - $ng) > 1) {
        $mid = intdiv($ok + $ng, 2);
        if ($h + $i * $b + $mid * $d > ($n - $i - $mid) * $e) {
            $ok = $mid;
        } else {
            $ng = $mid;
        }
    }
    if ($ok !== $n - $i + 1) {
        $cost = min($cost, $i * $a + $ok * $c);
    }
}
echo $cost . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
