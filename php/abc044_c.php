<?php

list($n, $a) = ints();
$x = ints();
for ($i = 0; $i < $n; ++$i) {
    $x[$i] -= $a;
}
// dp[i][t]=v x0~xiから0枚以上を選んで合計がtになる組み合わせ数v
$dp[-1][0] = 1;
for ($i = 0; $i < $n; ++$i) {
    foreach ($dp[$i - 1] as $t => $v) {
        if (isset($dp[$i][$t])) {
            $dp[$i][$t] += $v;
        } else {
            $dp[$i][$t] = $v;
        }
        if (isset($dp[$i][$t + $x[$i]])) {
            $dp[$i][$t + $x[$i]] += $v;
        } else {
            $dp[$i][$t + $x[$i]] = $v;
        }
    }
}
echo $dp[$n - 1][0] - 1; // 1枚も選ばない場合は除去
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
