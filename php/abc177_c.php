<?php
const MOD = 10 ** 9 + 7;
list($n) = ints();
$a = ints();
$cusum[0] = 0;
for ($i = 0; $i < $n; ++$i) {
    $cusum[$i + 1] = ModAdd($cusum[$i], $a[$i]);
}
$ans = 0;
for ($i = 0; $i < $n - 1; ++$i) {
    $ans = ModAdd($ans, ModMul($a[$i], ModSub($cusum[$n], $cusum[$i + 1])));
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
    foreach ($xs as $x) $res = modAdd($res, $x);
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
    foreach ($xs as $x) $res = modMul($res, $x);
    return $res;
}

// 割り算
function modDiv($x, $y)
{
    return modMul($x, modPow($y, MOD - 2));
}
