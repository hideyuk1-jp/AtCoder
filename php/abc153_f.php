<?php
list($n, $d, $a) = ints();
for ($i = 0; $i < $n; ++$i) list($x[], $h[]) = ints();
array_multisort($x, SORT_ASC, $h);
$cusum = array_fill(0, $n + 1, 0);
$cnt = 0;
// x で爆発させると x + 2d まで爆発が届くと考えても同じ
// 左のモンスターから順番に倒していく
for ($i = 0; $i < $n; ++$i) {
    $cusum[$i + 1] += $cusum[$i];
    $h[$i] -= $cusum[$i + 1];
    if ($h[$i] <= 0) continue;

    // この座標での爆発回数計算
    $tcnt = intdiv($h[$i], $a) + min(1, $h[$i] % $a);

    // 二分探索で爆発が届く最も右の座標を検索
    $ok = $i;
    $ng = $n;
    while (abs($ok - $ng) > 1) {
        $mid = intdiv($ok + $ng, 2);
        if ($x[$mid] - $x[$i] <= 2 * $d) $ok = $mid;
        else $ng = $mid;
    }
    if ($ok !== $i) {
        // imos法で今回の爆発で減らした体力量を管理
        $cusum[$i + 1] += $a * $tcnt;
        if ($ok + 2 <= $n) $cusum[$ok + 2] -= $a * $tcnt;
    }

    $cnt += $tcnt;
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
