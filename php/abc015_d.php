<?php

list($w) = ints();
list($n, $m) = ints();
// dp[i][k] := i個選んだ時に幅合計がkになる最大重要度
$dp = array_fill(0, $m + 1, array_fill(0, $w + 1, 0));
for ($i = 1; $i <= $n; ++$i) {
    list($a, $b) = ints();
    $_dp = $dp;
    for ($j = 0; $j <= min($i - 1, $m - 1); ++$j) {
        for ($k = 0; $k <= $w - $a; ++$k) {
            if ($_dp[$j][$k] + $b > $dp[$j + 1][$k + $a]) {
                $dp[$j + 1][$k + $a] = $_dp[$j][$k] + $b;
            }
        }
    }
}
$max = 0;
for ($j = 0; $j <= $m; ++$j) {
    for ($k = 0; $k <= $w; ++$k) {
        if ($dp[$j][$k] > $max) {
            $max = $dp[$j][$k];
        }
    }
}
echo $max, PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
