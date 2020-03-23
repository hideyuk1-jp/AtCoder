<?php
// 素因数分解（エラトステネスの篩）
fscanf(STDIN, '%d', $n);
$prime_fac = primeFactorization($n);
var_dump($prime_fac);

exit;

fscanf(STDIN, '%d', $max);
// 素数かどうか前処理
$ans = primesArr($max);
echo implode(' ', $ans);

exit;

// abc84-d
fscanf(STDIN, '%d', $q);
for ($i  = 0; $i < $q; $i++) {
    fscanf(STDIN, '%d %d', $l[], $r[]);
}
$max = max($r);

// 素数かどうか前処理
$is_prime = isPrime($max);

// 累積和
$s = array_fill(0, $max, 0);
for ($i = 1; $i <= $max; $i++) {
    if ($is_prime[$i] && $is_prime[($i + 1) / 2]) {
        $s[$i] = $s[$i - 1] + 1;
    } else {
        $s[$i] = $s[$i - 1];
    }
}

for ($i = 0; $i < $q; $i++) {
    echo ($s[$r[$i]] - $s[$l[$i] - 1]) . PHP_EOL;
}

/**
 * エラトステネスのふるい
 * $maxまでの整数のうち素数のみを格納した配列を返す
 */
function primesArr($max)
{
    $is_prime = isPrimeArr($max);
    $res = [];
    for ($i = 1; $i <= $max; $i++) {
        if ($is_prime[$i]) $res[] = $i;
    }
    return $res;
}

/**
 * エラトステネスのふるい
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

// 素因数分解
function primeFactorization($n)
{
    $res = [];
    $res[1] = 1;
    if ($n === 1) return $res;

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

function primes($max)
{
    $arr = [];
    for ($i = 2; $i <= $max; $i++) {
        if (isPrime($i)) $arr[] = $i;
    }
    return $arr;
}

function isPrime($n)
{
    if ($n === 1) return false;
    $rmax = (int) floor(sqrt($n));
    for ($i = 2; $i <= $rmax; $i++) {
        if ($n % $i === 0) return false;
    }
    return true;
}

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
