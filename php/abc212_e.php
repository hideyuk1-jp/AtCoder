<?php

define("MOD", 998244353);
[$n, $m, $k] = ints();
for ($i = 0; $i < $m; ++$i) {
    [$a, $b] = ints();
    $a--; // 0スタートに合わせる
    $b--;
    $no[$a][$b] = 1;
    $no[$b][$a] = 1;
}
$kumi = array_fill(0, $n, [0, 0]);
dfs();
var_dump($kumi);
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($k % 2) {
        $ans = modAdd($ans, modProd($kumi[$i][0], $kumi[$i][1], 2));
    } else {
        $ans = modAdd($ans, modPow($kumi[$i][0], 2));
    }
    var_dump($ans);
}
echo $ans;
function dfs($s = 0, $d = 0)
{
    global $n, $no, $k, $kumi;
    if ($d === intdiv($k, 2) - $k % 2) {
        $kumi[$s][0]++;
    }
    if ($d === intdiv($k, 2) + $k % 2) {
        $kumi[$s][1]++;
        return;
    }
    for ($i = 0; $i < $n; ++$i) {
        if ($s === $i || isset($no[$s][$i])) {
            continue;
        }
        dfs($i, $d + 1);
    }
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
