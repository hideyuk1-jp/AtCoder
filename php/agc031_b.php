<?php

define('MOD', 10 ** 9 + 7);
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($c[]) = ints();
}
$dp[0] = 1;
for ($i = 1; $i <= $n; ++$i) {
    $a = $c[$i - 1];
    $dp[$i] = $dp[$i - 1];
    if ((isset($last[$a])) && $last[$a] !== $i - 1) {
        $dp[$i] += $dp[$last[$a]];
    }
    $dp[$i] %= MOD;
    $last[$a] = $i;
}
echo $dp[$n];
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
