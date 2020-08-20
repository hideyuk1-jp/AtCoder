<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    $d = ints();
    // sum[i,j] := [0,0]~[i,j]までの美味しさの合計
    for ($j = 0; $j < $n; ++$j) {
        $sum[$i][$j] = $d[$j] + ($sum[$i - 1][$j] ?? 0) + ($sum[$i][$j - 1] ?? 0) - ($sum[$i - 1][$j - 1] ?? 0);
    }
}
// max[num] := num個以下のたこ焼きを焼く時の美味しさの合計の最大値
$max = array_fill(0, $n * $n + 1, 0);
for ($i = 0; $i < $n; ++$i) {
    for ($j = 0; $j < $n; ++$j) {
        for ($_i = $i; $_i < $n; ++$_i) {
            for ($_j = $j; $_j < $n; ++$_j) {
                $num = ($_i - $i + 1) * ($_j - $j + 1);
                $t = $sum[$_i][$_j] - ($sum[$i - 1][$_j] ?? 0) - ($sum[$_i][$j - 1] ?? 0) + ($sum[$i - 1][$j - 1] ?? 0);
                $max[$num] = max($max[$num], $t);
            }
        }
    }
}
// num個以下の最大値となるように累積和っぽく更新
for ($i = 1; $i <= $n * $n; ++$i) {
    $max[$i] = max($max[$i], $max[$i - 1]);
}
list($q) = ints();
for ($i = 0; $i < $q; ++$i) {
    list($p) = ints();
    $ans[] = $max[$p];
}
echo implode(PHP_EOL, $ans), PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
