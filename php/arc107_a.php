<?php
const MOD = 998244353;
[$a, $b, $c] = ints();
$ans = ((1 + $a) * $a / 2) % MOD;
$ans *= ((1 + $b) * $b / 2) % MOD;
$ans = $ans % MOD;
$ans *= ((1 + $c) * $c / 2) % MOD;
$ans = $ans % MOD;
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
