<?php

list($n) = ints();
$min = PHP_INT_MAX;
for ($a = (int) sqrt($n); $a >= 1; --$a) {
    $b = intdiv($n, $a);
    $c = $n % $a + abs($a - $b);
    $min = min($min, $c);
}
echo $min;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
