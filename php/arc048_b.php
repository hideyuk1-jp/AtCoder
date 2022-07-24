<?php

list($n) = ints();
$max_r = 10 ** 5;
$max_h = 2;
// cusum[r][h] := レーティングr以下の出す手hの人数
$cusum = array_fill(0, $max_r + 1, array_fill(0, $max_h + 1, 0));
for ($i = 0; $i < $n; ++$i) {
    list($r[$i], $h[$i]) = ints();
    --$h[$i];
    ++$cusum[$r[$i]][$h[$i]];
}
for ($i = 1; $i <= $max_r; ++$i) {
    for ($j = 0; $j <= $max_h; ++$j) {
        $cusum[$i][$j] += $cusum[$i - 1][$j];
    }
}
for ($i = 0; $i < $n; ++$i) {
    $w = $l = $d = 0;
    for ($j = 0; $j <= $max_h; ++$j) {
        $w += $cusum[$r[$i] - 1][$j];
        $l += $cusum[$max_r][$j] - $cusum[$r[$i]][$j];
        if ($h[$i] === $j) { // 引き分け（自分の分1引く）
            $d += $cusum[$r[$i]][$j] - $cusum[$r[$i] - 1][$j] - 1;
        }
        if (($h[$i] + 1) % 3 === $j) { // 勝ち
            $w += $cusum[$r[$i]][$j] - $cusum[$r[$i] - 1][$j];
        }
        if (($h[$i] + 2) % 3 === $j) { // 負け
            $l += $cusum[$r[$i]][$j] - $cusum[$r[$i] - 1][$j];
        }
    }
    echo implode(' ', [$w, $l, $d]), PHP_EOL;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
