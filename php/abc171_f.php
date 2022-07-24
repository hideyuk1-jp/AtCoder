<?php

define('MOD', 10 ** 9 + 7);
list($k) = ints();
list($s) = strs();
$ls = strlen($s);
init($ls + $k - 1);
$pow25[0] = $pow26[0] = 1;
for ($i = 1; $i <= $k; ++$i) {
    $pow25[$i] = modMul($pow25[$i - 1], 25);
    $pow26[$i] = modMul($pow26[$i - 1], 26);
}
$ans = 0;
for ($i = 0; $i <= $k; ++$i) {
    $ans = modAdd($ans, modMul(modMul(nCr2($ls + $k - $i - 1, $ls - 1), $pow25[$k - $i]), $pow26[$i]));
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
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

// 階乗
function modFac($n)
{
    if ($n === 0) {
        return 1;
    }
    return modMul($n, modFac($n - 1));
}

// 順列
function nPr($n, $r)
{
    if ($r === 0) {
        return 1;
    }
    return modMul(nPr($n, $r - 1), $n - $r + 1);
}

// 組み合わせ
function nCr($n, $r)
{
    $r = min($r, $n - $r);
    if ($r === 0) {
        return 1;
    }
    return modDiv(nPr($n, $r), modFac($r));
}

// 階乗、逆元を前処理
function init($max)
{
    global $fac, $finv, $inv;
    $fac = $finv = [1, 1];
    $inv[1] = 1;
    for ($i = 2; $i <= $max; ++$i) {
        $fac[$i] = modMul($fac[$i - 1], $i);
        $inv[$i] = modSub(MOD, modMul($inv[MOD % $i], intdiv(MOD, $i)));
        $finv[$i] = modMul($finv[$i - 1], $inv[$i]);
    }
}

// 組み合わせ(前処理利用）
function nCr2($n, $r)
{
    global $fac, $finv;
    $r = min($r, $n - $r);
    if ($r === 0) {
        return 1;
    }
    return modMul($fac[$n], modMul($finv[$r], $finv[$n - $r]));
}
