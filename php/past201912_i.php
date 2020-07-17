<?php
// bitdp
list($n, $m) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($s, $c[]) = strs();
    $d = 0;
    for ($j = 0; $j < $n; ++$j) if ($s[$j] === 'Y') $d |= 1 << $j;
    $t[] = $d;
}
$dp = array_fill(0, $m + 1, array_fill(0, 1 << $n, INF));
$dp[0][0] = 0;
for ($i = 0; $i < $m; ++$i) {
    for ($j = 0; $j < (1 << $n); ++$j) {
        $dp[$i + 1][$j] = min($dp[$i + 1][$j], $dp[$i][$j]);
        $dp[$i + 1][$j | $t[$i]] = min($dp[$i + 1][$j | $t[$i]], $dp[$i][$j] + $c[$i]);
    }
}
echo $dp[$m][(1 << $n) - 1] !== INF ? $dp[$m][(1 << $n) - 1] : -1;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
