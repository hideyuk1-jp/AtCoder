<?php

// バーチャル CまでAC 600 24:38 => 推定パフォ 1307
// D
fscanf(STDIN, '%d', $n);
for ($i = 2; $i <= $n; $i++) {
    $pf = primeFactorization($i);
    foreach ($pf as $p => $c) {
        if ($p !== 1) {
            if (isset($cnt_p[$p])) {
                $cnt_p[$p] += $c;
            } else {
                $cnt_p[$p] = $c;
            }
        }
    }
}
$cnt75 = f(75);
$cnt25 = f(25);
$cnt15 = f(15);
$cnt5 = f(5);
$cnt3 = f(3);

$ans = $cnt75 + $cnt25 * ($cnt3 - 1) + $cnt15 * ($cnt5 - 1) + $cnt5 * ($cnt5 - 1) / 2 * ($cnt3 - 2);
echo $ans;

function f($n)
{
    global $cnt_p;
    return count(array_filter($cnt_p, function ($v) use ($n) {
        return $v >= $n - 1;
    }));
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
        if ($is_prime[$i]) {
            $res[] = $i;
        }
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

exit;

// C
fscanf(STDIN, '%d', $n);
$cnt = cnt753(7) + cnt753(5) + cnt753(3);
echo $cnt;

function cnt753($x)
{
    global $n;

    if ($x > $n) {
        return 0;
    }
    $sx = strval($x);

    $cnt = 0;

    if (substr_count($sx, '7') > 0 && substr_count($sx, '5') > 0 && substr_count($sx, '3') > 0) {
        $cnt++;
    }
    $cnt += cnt753((int) ('7' . $sx));
    $cnt += cnt753((int) ('5' . $sx));
    $cnt += cnt753((int) ('3' . $sx));
    return $cnt;
}

exit;

// B
fscanf(STDIN, '%s', $s);
$n = strlen($s);
$min = 1000;
for ($i = 0; $i < $n - 2; $i++) {
    $x = abs((int) substr($s, $i, 3) - 753);
    $min = min($x, $min);
}
echo $min;

exit;

// A
fscanf(STDIN, '%d', $x);
echo ($x === 3 || $x === 5 || $x === 7) ? 'YES' : 'NO';
