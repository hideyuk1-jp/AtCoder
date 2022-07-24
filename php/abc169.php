<?php

// C2
fscanf(STDIN, '%d %s', $a, $b);
$b = intval(str_replace('.', '', $b));
echo intdiv($a * $b, 100);

exit;

// D
fscanf(STDIN, '%d', $n);
$prime_fac = primeFactorization($n);
$ans = 0;
foreach ($prime_fac as $c) {
    $cnt = $t = 0;
    for ($i = 1; $i <= $c; $i++) {
        $t += $i;
        if ($t <= $c) {
            $cnt++;
        } else {
            break;
        }
    }
    $ans += $cnt;
}
echo $ans;

/**
 * 素数列挙（エラトステネスのふるい）
 * $maxまでの整数のうち素数のみを格納した配列を返す
 */
function primesArr($max)
{
    $is_prime = isPrimeArr($max);
    $res = [];
    for ($i = 1; $i <= $max; $i++) {
        if ($is_prime[$i]) {
            $res[] = $i;
        }
    }
    return $res;
}

/**
 * 素数判定（エラトステネスのふるい）
 * $maxまでの整数が素数かどうかboolを格納した配列を返す
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

exit;

// B
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 1;
sort($a);
for ($i = 0; $i < $n; $i++) {
    if ($a[$i] === 0) {
        exit('0');
    }
    $ans *= $a[$i];
    if ($ans > 10 ** 18) {
        exit('-1');
    }
}
echo $ans;

exit;

// A
fscanf(STDIN, '%d %d', $a, $b);
echo $a * $b;
