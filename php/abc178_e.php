<?php

list($n) = ints();
$base = [
    [0, 0],
    [0, 10 ** 9],
];
$mins = array_fill(0, 4, PHP_INT_MAX);
$maxs = array_fill(0, 4, 0);
for ($i = 0; $i < $n; ++$i) {
    list($x, $y) = ints();
    for ($j = 0; $j < 2; ++$j) {
        $d = abs($base[$j][0] - $x) + abs($base[$j][1] - $y);
        if ($d < $mins[$j]) {
            $mins[$j] = $d;
        }
        if ($d > $maxs[$j]) {
            $maxs[$j] = $d;
        }
    }
}
$max = 0;
for ($i = 0; $i < 4; ++$i) {
    if ($maxs[$i] - $mins[$i] > $max) {
        $max = $maxs[$i] - $mins[$i];
    }
}
echo $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
