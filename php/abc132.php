<?php

define('MOD', 10 ** 9 + 7);
// 入力
fscanf(STDIN, '%d %d', $n, $blue);

$red = $n - $blue;

// 答え出力用配列
$ans = array_fill(0, $blue, 0);

// 計算
combination($n);
for ($i = 1; $i <= $blue; $i++) {
    // 赤いボールが足りない場合
    if ($i - 1 > $red) {
        break;
    }

    // 赤いボールの並べ方
    $red_pos = $i - 1 + 2; // 赤いボールを置ける場所は青いボールの間と左右
    $red_free = $red - ($i - 1); // 自由に置ける赤いボール（青いボールの間には必ず置く）

    if ($red_pos > 1 && $red_free > 0) {
        $red_comb = combination($red_free + $red_pos - 1, $red_pos - 1);
    } else {
        $red_comb = 1;
    }
    // 青いボールの並べ方
    $blue_pos = $i;
    if ($blue_pos > 1 && $blue > 1) {
        $blue_comb = combination($blue - 1, $blue_pos - 1);
    } else {
        $blue_comb = 1;
    }

    // 全てのボールの並べ方
    $ans[$i - 1] = ($red_comb * $blue_comb) % MOD;
}

// 出力
foreach ($ans as $v) {
    echo $v.PHP_EOL;
}

function combination($n, $m = 0)
{
    static $pascal;
    if (!isset($pascal)) {
        $pascal[0][0] = 1;
        for ($j = 1; $j <= $n; $j++) {
            for ($i = 0; $i <= $j; $i++) {
                $pascal[$j][$i] = (($pascal[$j-1][$i-1] ?? 0) + ($pascal[$j-1][$i] ?? 0)) % MOD;
            }
        }
    }
    return $pascal[$n][$m];
}
