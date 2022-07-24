<?php

list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    $sum[$i] = ($sum[$i - 1] ?? 0) + $a[$i];
}
$ans = PHP_INT_MAX;
for ($i = 0; $i < $n - 1; ++$i) {
    $ans = min($ans, abs($sum[$i] - ($sum[$n - 1] - $sum[$i])));
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
