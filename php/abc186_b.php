<?php
[$h, $w] = ints();
$min = PHP_INT_MAX;
for ($i = 0; $i < $h; ++$i) {
    $a[] = ints();
    $min = min($min, min($a[$i]));
}
$ans = 0;
for ($i = 0; $i < $h; ++$i) {
    $ans += array_sum($a[$i]) - $min * $w;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
