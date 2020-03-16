<?php
define("MOD", 10 ** 9 + 7);

// nCr 前処理
$comb = comb(100);

echo $comb[100][1] . PHP_EOL;
echo $comb[100][2] . PHP_EOL;

// nCr MODで余りを取っているので注意！
function comb($max)
{
    $pascal[0][0] = 1;
    for ($j = 1; $j <= $max; $j++) {
        for ($i = 0; $i <= $j; $i++) {
            $pascal[$j][$i] = (($pascal[$j - 1][$i - 1] ?? 0) + ($pascal[$j - 1][$i] ?? 0)) % MOD;
        }
    }
    return $pascal;
}
