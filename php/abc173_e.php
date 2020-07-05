<?php
define('MOD', 10 ** 9 + 7);
list($n, $k) = ints();
$a = ints();
$ap = $am = $az = [];
for ($i = 0; $i < $n; ++$i) {
    if ($a[$i] > 0) $ap[] = $a[$i];
    elseif ($a[$i] < 0) $am[] = abs($a[$i]);
    else $az[] = $a[$i];
}
// 0を選ぶしかない場合
if ((count($az) > 1 && $k > count($ap) + count($am)) || count($az) === $n) exit('0');
// マイナスを奇数個選ぶしかない場合（マイナスになる場合）
if (($k === count($ap) + count($am) && count($am) % 2) ||
    ($n === count($am) && $k % 2)
) {
    if (count($az) > 0) exit('0');
    $apm = array_merge($ap, $am);
    sort($apm);
    $ans = 1;
    for ($i = 0; $i < $k; ++$i) {
        $ans = modMul($ans, $apm[$i]);
    }
    echo modSub(0, $ans);
    exit;
}
rsort($ap);
rsort($am);
$q = new SplPriorityQueue();
for ($i = 1; $i < count($ap); $i += 2) {
    $q->insert([$ap[$i] * $ap[$i - 1], true], $ap[$i] * $ap[$i - 1]);
}
for ($i = 1; $i < count($am); $i += 2) {
    $q->insert([$am[$i] * $am[$i - 1], false], $am[$i] * $am[$i - 1]);
}
$i = 0;
$ans = 1;
while ($k > 1) {
    list($v, $f) = $q->extract();
    while ($k % 2 && $f && $i + 2 === count($ap))
        list($v, $f) = $q->extract();
    $k -= 2;
    $ans = modMul($ans, $v % MOD);
    if ($f) $i += 2;
}
if ($k === 1) $ans = modMul($ans, $ap[$i]);
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
