<?php
// コンテスト参加 Dまで自力AC 1000 22:24 => パフォ 1060
// F
fscanf(STDIN, '%d', $n);
$ans = 0;

// N-1が倍数になるパターン
$divisors = divisors($n - 1);
$ans += count($divisors) - 1;

// Nが倍数になるパターン
$divisors = divisors($n);
// var_dump($divisors);
foreach ($divisors as $d) {
    if ($d === 1) continue;
    $n2 = $n;
    while ($n2 % $d === 0) {
        $n2 = intdiv($n2, $d);
    }
    if ($n2 % $d === 1) $ans++;
}

echo $ans;

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

exit;

// E
fscanf(STDIN, '%d %d %d', $n, $k, $c);
fscanf(STDIN, '%s', $s);

for ($i = 0; $i < $n; $i++) {
    if ($s[$i] === 'o') $sa[] = $i;
}

function proc($prev, $nissuu)
{
    global $sa, $n, $c;
    if ($prev + $c >= $n) return [];
    foreach ($sa as $v) {
        if ($v <= $prev + $c) continue;
        $arr[] = $v;
    }
    if (count($arr) === 0) return [];
}


exit;

// D
fscanf(STDIN, '%d', $k);
$arr = f();
// var_dump($arr);
echo $arr[$k - 1];

function f()
{
    global $k;
    $res = [];
    for ($i = 1; $i <= 9; $i++) {
        $res[] = $i;
    }
    $keta = 2;
    while (count($res) < $k) {
        for ($i = 1; $i <= 9; $i++) {
            $res = array_merge($res, getRunrun($i, $keta - 1));
        }
        $keta++;
    }
    sort($res);
    return $res;
}

function getRunrun($n, $keta)
{
    static $memo;
    if (isset($memo[$n][$keta])) return $memo[$n][$keta];
    for ($i = max($n - 1, 0); $i <= min($n + 1, 9); $i++) {
        $arr[] = (int) (strval($n) . strval($i));
    }
    if ($keta === 1) {
        $memo[$n][$keta] = $arr;
        return $arr;
    }
    $res = [];
    foreach ($arr as $v) {
        $tmp = getRunrun($v % 10, $keta - 1);
        foreach ($tmp as $v2) {
            $res[] = (int) (strval($n) . str_pad($v2, $keta, 0, STR_PAD_LEFT));
        }
    }
    $memo[$n][$keta] = $res;
    return $res;
}

exit;

// C
fscanf(STDIN, '%d %d', $n, $k);
if ($n === 0 || $n % $k === 0) {
    echo 0;
    exit;
}
if ($n > $k) $n %= $k;
echo ($n <= $k / 2) ? $n : $k - $n;

exit;

// B
fscanf(STDIN, '%d %d', $n, $m);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
rsort($a);
$sum = array_sum($a);
for ($i = 0; $i < $n; $i++) {
    if ($a[$i] < $sum * 1 / (4 * $m)) {
        $i--;
        break;
    }
}
echo ($i + 1 >= $m) ? 'Yes' : 'No';


exit;

// A
fscanf(STDIN, '%d %d %d', $a, $b, $c);
echo $c . ' ' . $a . ' ' . $b;
