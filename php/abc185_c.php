<?php

const MOD = 2 ** 63;
[$l] = ints();
$nCr = comb($l - 1);
echo $nCr[$l - 1][11];
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
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
