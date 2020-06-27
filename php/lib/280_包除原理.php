<?php
// ABC172_E
define("MOD", 10 ** 9 + 7);
list($n, $m) = ints();
init($m);
$cnta = nPr2($m, $n);
// 包除原理
// 全てがある条件を満たす組み合わせ数を求める際に、
// 条件を満たさないものの個数を全通り（他は条件なし）をそれぞれ求めて組み合わせ数を足しひきして求める
// （ベン図で全体をプラス、oをマイナス、oの重なりをプラス...と求めていく）
$cntb = 0;
for ($i = 0; $i <= $n; ++$i) {
    $c = modMul(nCr2($n, $i), nPr2($m - $i, $n - $i));
    if ($i & 1) $cntb = modSub($cntb, $c);
    else $cntb = modAdd($cntb, $c);
}
echo modMul($cnta, $cntb);
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
    return modMul(nPr($n, $r - 1), $n - $r + 1);
}

// 組み合わせ
function nCr($n, $r)
{
    $r = min($r, $n - $r);
    if ($r === 0) return 1;
    return modDiv(nPr($n, $r), modFac($r));
}

// 階乗、逆元を前処理
function init($n)
{
    global $fact, $ifact;
    $fact[0] = 1;
    for ($i = 1; $i <= $n; ++$i) $fact[$i] = modMul($fact[$i - 1], $i);
    $ifact[$n] = modDiv(1, $fact[$n]);
    for ($i = $n; $i >= 1; --$i)
        $ifact[$i - 1] = modMul($ifact[$i], $i);
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
