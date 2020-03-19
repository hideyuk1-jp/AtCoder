<?php
// バーチャルでCまで自力AC 600 52:14 => 推定パフォ655

define('MOD', 10 ** 9 + 7);
fscanf(STDIN, '%d %d', $x, $y);
$y_step = (2 * $y - $x) / 3;
$x_step = (2 * $x - $y) / 3;
if ($y_step != (int) $y_step || $y_step < 0 || $x_step < 0) {
    echo 0;
    exit;
}
echo nCr($y_step + $x_step, $y_step);

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
    if ($x & 1) $res = modMul($res, $n);
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
    return modDiv(nPr($n, $r), modFac($r));
}

exit;

fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) fscanf(STDIN, '%d %d', $x[], $y[]);
$sum = 0.0;
for ($i = 0; $i < $n - 1; $i++) {
    for ($j = $i + 1; $j < $n; $j++) {
        $sum += sqrt(($x[$i] - $x[$j]) ** 2 + ($y[$i] - $y[$j]) ** 2);
    }
}
echo $sum * ($n - 1) / nCr2($n, 2);

function fac2($n)
{
    if ($n === 0) return 1;
    return $n * fac2($n - 1);
}

// 順列
function nPr2($n, $r)
{
    if ($r === 0) return 1;
    return fac2($n) / fac2($n - $r);
}

// 組み合わせ
function nCr2($n, $r)
{
    $r = min($r, $n - $r);
    return nPr2($n, $r) / fac2($r);
}

exit;

fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);
if ($n % 2 == 1) {
    echo 'No';
    exit;
}
echo (substr($s, 0, $n / 2) === substr($s, $n / 2, $n / 2)) ? 'Yes' : 'No';

exit;

fscanf(STDIN, '%d', $r);
echo $r ** 2;
