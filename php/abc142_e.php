<?php
// bitDP
list($n, $m) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($a[], $b) = ints();
    $c = ints();
    // どの宝箱を開けられるか bit で管理
    $d = 0;
    for ($j = 0; $j < $b; ++$j) {
        --$c[$j];
        $d |= 1 << $c[$j];
    }
    $bits[] = $d;
}
$dp = array_fill(0, $m + 1, array_fill(0, 1 << $n, INF));
$dp[0][0] = 0;
for ($i = 0; $i < $m; ++$i) {
    for ($j = 0; $j < (1 << $n); ++$j) {
        $dp[$i + 1][$j] = min($dp[$i + 1][$j], $dp[$i][$j]);
        $dp[$i + 1][$j | $bits[$i]] = min($dp[$i + 1][$j | $bits[$i]], $dp[$i][$j] + $a[$i]);
    }
}
echo $dp[$m][(1 << $n) - 1] !== INF ? $dp[$m][(1 << $n) - 1] : -1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
