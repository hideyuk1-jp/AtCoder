<?php

define("MOD", 10 ** 9 + 7);
list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    if (isset($c[$a[$i]])) {
        $c[$a[$i]]++;
    } else {
        $c[$a[$i]] = 1;
    }
}
if ($n % 2 && $c[0] !== 1) {
    exit('0');
}
for ($i = 0; $i < intdiv($n, 2); ++$i) {
    $k = abs($i - ($n - $i - 1));
    if ($c[$k] !== 2) {
        exit('0');
    }
}
echo modPow(2, intdiv($n, 2));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// 足し算
function modAdd($x, $y)
{
    return ($x + $y) % MOD;
}

// 引き算
function modSub($x, $y)
{
    return ($x + MOD - $y) % MOD;
}

// 掛け算
function modMul($x, $y)
{
    return ($x * $y) % MOD;
}

// 割り算
function modDiv($x, $y)
{
    return modMul($x, modPow($y, MOD - 2));
}

// 累乗（繰り返し二乗法）
function modPow($n, $x)
{
    if ($x === 0) {
        return 1;
    }
    $res = (modPow($n, $x >> 1) ** 2) % MOD;
    if ($x % 2 === 1) {
        $res = modMul($res, $n);
    }
    return $res;
}
