<?php

list($n) = ints();
$a = ints();
$max_t = PHP_INT_MIN;
for ($i = 0; $i < $n; ++$i) {
    $max_a = PHP_INT_MIN;
    $max_j = -1;
    for ($j = 0; $j < $n; $j++) {
        if ($i === $j) {
            continue;
        }
        $l = min($i, $j);
        $r = max($i, $j);
        $sum_a = 0;
        for ($k = $l + 1; $k <= $r; $k += 2) {
            $sum_a += $a[$k];
        }
        if ($sum_a > $max_a) {
            $max_a = $sum_a;
            $max_j = $j;
        }
    }
    $sum_t = 0;
    $l = min($i, $max_j);
    $r = max($i, $max_j);
    for ($k = $l; $k <= $r; $k += 2) {
        $sum_t += $a[$k];
    }
    $max_t = max($max_t, $sum_t);
}
echo $max_t . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
