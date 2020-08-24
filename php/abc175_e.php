<?php
list($R, $C, $K) = ints();
for ($i = 0; $i < $K; ++$i) {
    list($r, $c, $v) = ints();
    $val[$r][$c] = $v;
}
// dp[j][k] := 見ている行のj列までで、この行上のk個以下のアイテムを選んだ時の価値の合計の最大値
$dp = array_fill(0, $C + 1, array_fill(0, 4, 0));
for ($i = 1; $i <= $R; ++$i) {
    for ($j = 1; $j <= $C; ++$j) {
        for ($k = 0; $k < 4; ++$k) {
            if ($dp[$j - 1][$k] > $dp[$j][3]) {
                $dp[$j][$k] = $dp[$j - 1][$k];
            } else {
                $dp[$j][$k] = $dp[$j][3];
            }
        }
        if (!isset($val[$i][$j])) continue;
        for ($k = 3; $k >= 1; --$k) {
            if ($dp[$j][$k - 1] + $val[$i][$j] > $dp[$j][$k]) {
                $dp[$j][$k] = $dp[$j][$k - 1] + $val[$i][$j];
            }
        }
    }
}
echo $dp[$C][3], PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
