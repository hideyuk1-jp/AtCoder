<?php
define('MOD', 10 ** 9 + 7);
list($n) = ints();
echo modFac($n);

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
    if ($x === 0) return 1;
    $res = (modPow($n, $x >> 1) ** 2) % MOD;
    if ($x % 2 === 1) $res = modMul($res, $n);
    return $res;
}

// 階乗
function modFac($n)
{
    if ($n === 0) return 1;
    return modMul($n, modFac($n - 1));
}

// 順列
function nPr($n, $r)
{
    if ($r === 0) return 1;
    return modDiv(modFac($n), modFac($n - $r));
}

// 組み合わせ
function nCr($n, $r)
{
    $r = min($r, $n - $r);
    if ($r === 0) return 1;
    return modDiv(nPr($n, $r), modFac($r));
}
