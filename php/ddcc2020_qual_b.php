<?php
list($n) = ints();
$a = ints();
$csum = 0;
$sum = array_sum($a);
$min = PHP_INT_MAX;
for ($i = 0; $i < $n - 1; ++$i) {
    $csum += $a[$i];
    $min = min($min, abs($sum - 2 * $csum));
}
echo $min;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
