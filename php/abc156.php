<?php

fscanf(STDIN, '%d %d %d', $n, $a, $b);
define('MOD', 10 ** 9 + 7);

$ans = modSub(modSub(modSub(modPow(2, $n), 1), nCr($n, $a)), nCr($n, $b));
echo $ans . PHP_EOL;

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
    return $x * modPow($y, MOD - 2) % MOD;
}

// 累乗（繰り返し二乗法）
function modPow($n, $x)
{
    if ($x === 0) {
        return 1;
    }
    $res = (modPow($n, $x >> 1) ** 2) % MOD;
    if ($x % 2 === 1) {
        $res = ($res * $n) % MOD;
    }
    return $res;
}

// 階乗
function modFac($n)
{
    if ($n === 0) {
        return 1;
    }
    return $n * modFac($n - 1) % MOD;
}

// 順列
function nPr($n, $r)
{
    if ($r === 0) {
        return 1;
    }
    return nPr($n, $r - 1) * ($n - $r + 1) % MOD;
}

// 組み合わせ
function nCr($n, $r)
{
    $r = min($r, $n - $r);
    if ($r === 0) {
        return 1;
    }
    if ($r === 1) {
        return $n;
    }
    return modDiv(nPr($n, $r), modFac($r));
}

exit;

fscanf(STDIN, '%d', $n);
$x = array_map('intval', explode(' ', trim(fgets(STDIN))));

$x_max = 0;
for ($i = 0; $i < $n; $i++) {
    $x_max = max($x[$i], $x_max);
}
$hp_min = (100 ** 2) * 100;
for ($p = 1; $p <= $x_max; $p++) {
    $hp = 0;
    for ($i = 0; $i < $n; $i++) {
        $hp += ($x[$i] - $p) ** 2;
    }
    $hp_min = min($hp, $hp_min);
}
echo $hp_min . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $n, $k);
$ans = 1;
while (true) {
    if ($n / $k < 1) {
        break;
    }
    $ans++;
    $n = floor($n / $k);
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $n, $r);
$ans = ($n >= 10) ? $r : $r + 100 * (10 - $n);
echo $ans . PHP_EOL;
