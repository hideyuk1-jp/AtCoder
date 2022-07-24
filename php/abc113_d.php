<?php

const MOD = 10 ** 9 + 7;
list($H, $W, $K) = ints();
// 動的計画法
// dp[i][j]: i行目の移動を終えた後、j列目にいるあみだくじの本数
$dp = array_fill(0, $H + 1, array_fill(1, $W, 0));
$dp[0][1] = 1;
for ($i = 1; $i <= $H; ++$i) {
    // i行目の線の引き方を全探索
    for ($j = 0; $j < 2 ** ($W - 1); ++$j) {
        $next = array_fill(1, $W, 0);
        for ($k = 0; $k < $W - 1; ++$k) {
            if ($j >> $k & 1) {
                // 既に線がある場合は「正しいあみだくじ」ではないのでスキップ
                if ($next[$k + 1] !== 0) {
                    continue 2;
                }
                $next[$k + 1] = 1; // 今の列から右に伸びる
                $next[$k + 2] = -1; // 右隣の列から左に伸びる
            }
        }
        for ($x = 1; $x <= $W; ++$x) {
            $dp[$i][$x + $next[$x]] += $dp[$i - 1][$x];
            $dp[$i][$x + $next[$x]] %= MOD;
        }
    }
}
echo $dp[$H][$K];
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
