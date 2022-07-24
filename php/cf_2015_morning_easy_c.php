<?php

list($n, $k, $m, $r) = ints();
for ($i = 0; $i < $n - 1; ++$i) {
    list($s[$i]) = ints();
    $s[$i] -= $r;
}
if ($k === $n) {
    $x = -array_sum($s);
} else {
    rsort($s);
    $sum = 0;
    for ($i = 0; $i < $k - 1; ++$i) {
        $sum += $s[$i];
    }
    if ($sum + $s[$k - 1] >= 0) {
        exit('0' . PHP_EOL);
    }
    $x = -$sum;
}
if ($x + $r > $m) {
    exit('-1' . PHP_EOL);
}
echo max(0, $x + $r) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
