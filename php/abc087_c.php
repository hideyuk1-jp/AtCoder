<?php

list($n) = ints();
$a[] = ints();
$a[] = ints();
$cusum[0][0] = $cusum[1][0] = 0;
for ($i = 0; $i < $n; $i++) {
    $cusum[0][$i + 1] = $cusum[0][$i] + $a[0][$i];
    $cusum[1][$i + 1] = $cusum[1][$i] + $a[1][$i];
}
$ans = -1;
for ($i = 0; $i < $n; $i++) {
    $ans = max($ans, $cusum[0][$i + 1] + $cusum[1][$n] - $cusum[1][$i]);
}
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
