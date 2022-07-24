<?php

define('MOD', 10 ** 9 + 7);
list($n) = ints();
$c = [];
for ($i = 1; $i <= $n; ++$i) {
    $a = primeFactorization($i);
    foreach ($a as $j => $v) {
        if (isset($c[$j])) {
            $c[$j] += $v;
        } else {
            $c[$j] = $v;
        }
    }
}
$cnt = 1;
foreach ($c as $v) {
    $cnt = modMul($cnt, $v + 1);
}
echo $cnt;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
/**
 * 素数列挙（エラトステネスのふるい）
 * $max以下の素数を格納した配列を返す
 */
function primesArr($max)
{
    $arr = array_fill(2, $max - 1, true);
    $rmax = (int) floor(sqrt($max));
    for ($i = 2; $i <= $rmax; $i++) {
        if (!isset($arr[$i])) {
            continue;
        }
        for ($j = 2 * $i; $j <= $max; $j += $i) {
            unset($arr[$j]);
        }
    }
    return array_keys($arr);
}

/**
 * 素数判定（エラトステネスのふるい）
 * $max以下の整数が素数かどうかboolを格納した配列を返す
 */
function isPrimeArr($max)
{
    $arr = array_fill(0, $max + 1, true);
    $arr[0]  = $arr[1] = false;
    $rmax = (int) floor(sqrt($max));
    for ($i = 2; $i <= $rmax; $i++) {
        for ($j = 2 * $i; $j <= $max; $j += $i) {
            $arr[$j] = false;
        }
    }
    return $arr;
}

// 素因数分解（エラトステネスのふるい）
// インデックスに素数、値に数を格納した配列を返す
// （1は素数ではないので含まない）
function primeFactorization($n)
{
    $res = [];
    if ($n === 1) {
        return $res;
    }

    $primes = primesArr((int) sqrt($n) + 1);

    foreach ($primes as $prime) {
        while ($n % $prime === 0) {
            if (isset($res[$prime])) {
                $res[$prime]++;
            } else {
                $res[$prime] = 1;
            }
            $n /= $prime;
        }
    }

    if ($n > 1) {
        if (isset($res[$n])) {
            $res[$n]++;
        } else {
            $res[$n] = 1;
        }
    }

    return $res;
}

// 素数列挙（試し割り）
function primes($max)
{
    $arr = [];
    for ($i = 2; $i <= $max; $i++) {
        if (isPrime($i)) {
            $arr[] = $i;
        }
    }
    return $arr;
}

// 素数判定（試し割り）
function isPrime($n)
{
    if ($n === 1) {
        return false;
    }
    $rmax = (int) floor(sqrt($n));
    for ($i = 2; $i <= $rmax; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

// 約数列挙
function divisors($max)
{
    $arr = [];
    $rmax = (int) floor(sqrt($max));
    for ($i = 1; $i <= $rmax; $i++) {
        if ($max % $i === 0) {
            $arr[] = $i;
            $arr[] = $max / $i;
        }
    }
    sort($arr);
    return array_unique($arr);
}

// 掛け算
function modMul($x, $y)
{
    return ($x * $y) % MOD;
}
