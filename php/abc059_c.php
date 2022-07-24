<?php

list($n) = ints();
$a = ints();
$ans = PHP_INT_MAX;
$sum0 = $sum1 = 0;
$cnt0 = $cnt1 = 0;
for ($i = 0; $i < $n; ++$i) {
    $sum0 += $a[$i];
    $sum1 += $a[$i];
    if ($i % 2 === 0) {
        // 奇数番目まで和がプラス
        $d = abs(min(0, $sum0 - 1));
        $sum0 += $d;
        $cnt0 += $d;

        // 奇数番目まで和がマイナス
        $d = abs(max(0, $sum1 + 1));
        $sum1 -= $d;
        $cnt1 += $d;
    } else {
        // 奇数番目まで和がプラス
        $d = abs(max(0, $sum0 + 1));
        $sum0 -= $d;
        $cnt0 += $d;

        // 奇数番目まで和がマイナス
        $d = abs(min(0, $sum1 - 1));
        $sum1 += $d;
        $cnt1 += $d;
    }
}
echo min($cnt0, $cnt1);

// 偶数盤目の項までの和をプラスにする場合
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
