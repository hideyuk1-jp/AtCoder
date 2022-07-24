<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($t[]) = ints();
}
$min = PHP_INT_MAX;
$sum = array_sum($t);
for ($i = 0; $i < 2 ** $n; ++$i) {
    $cnt = 0;
    for ($j = 0; $j < $n; ++$j) {
        if ($i >> $j & 1) {
            $cnt += $t[$j];
        }
    }
    $min = min($min, max($cnt, $sum - $cnt));
}
echo $min . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
