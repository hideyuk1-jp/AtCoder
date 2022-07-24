<?php

const MOD = 998244353;
list($n, $m, $k) = ints();
init($n - 1);
$ans = 0;
// 隣り合う組のうちi個が同じ色
// = 左端を除いたn-1個のブロックのうちi個が左隣と同じ色（１通り）で、
//   その他のn-1-i個のブロックは左隣と違う色（m-1通り）。
//   左端のブロックは何色でも良い（m通り）
for ($i = 0; $i <= $k; ++$i) {
    $t = modProd($m, nCr2($n - 1, $i), modPow($m - 1, $n - 1 - $i));
    $ans = modAdd($ans, $t);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// 足し算
function modAdd($x, $y)
{
    return ($x + $y) % MOD;
}

// SUM
function modSum(...$xs)
{
    $res = 0;
    foreach ($xs as $x) {
        $res = modAdd($res, $x);
    }
    return $res;
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

// PRODUCT
function modProd(...$xs)
{
    $res = 1;
    foreach ($xs as $x) {
        $res = modMul($res, $x);
    }
    return $res;
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
function init($n)
{
    global $fact, $ifact;
    $fact[0] = 1;
    for ($i = 1; $i <= $n; ++$i) {
        $fact[$i] = modMul($fact[$i - 1], $i);
    }
    $ifact[$n] = modDiv(1, $fact[$n]);
    for ($i = $n; $i >= 1; --$i) {
        $ifact[$i - 1] = modMul($ifact[$i], $i);
    }
}

// 順列（前処理）
function nPr2($n, $r)
{
    global $fact, $ifact;
    return modMul($fact[$n], $ifact[$n - $r]);
}

// 組み合わせ（前処理）
function nCr2($n, $r)
{
    global $fact, $ifact;
    return modMul(modMul($fact[$n], $ifact[$r]), $ifact[$n - $r]);
}
