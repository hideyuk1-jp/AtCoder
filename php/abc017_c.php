<?php
list($n, $m) = ints();
$sum = 0;
$cusum = array_fill(0, $m, 0);
for ($i = 0; $i < $n; ++$i) {
    list($l, $r, $s) = ints();
    --$l;
    --$r;
    $sum += $s;
    $cusum[$l] += $s;
    if ($r + 1 < $m) $cusum[$r + 1] -= $s;
}
for ($i = 0; $i < $m - 1; ++$i) $cusum[$i + 1] += $cusum[$i];
echo ($sum - min($cusum)) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
