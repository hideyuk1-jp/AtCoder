<?php

[$a, $b, $w] = ints();
$w *= 1000;
$min = PHP_INT_MAX;
$max = -1;
for ($i = 1; $i <= 1000000; ++$i) {
    if ($a * $i <= $w && $b * $i >= $w) {
        $min = min($min, $i);
        $max = max($max, $i);
    }
}
echo $max === -1 ? 'UNSATISFIABLE' : implode(' ', [$min, $max]);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
