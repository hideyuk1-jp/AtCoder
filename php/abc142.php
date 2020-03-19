<?php
fscanf(STDIN, '%d %d', $a, $b);
$gcd = gcd($a, $b);
$divisors = divisors($gcd);
$ans = 1;
foreach ($divisors as $v) {
    if (isPrime($v)) $ans++;
}
echo $ans . PHP_EOL;

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

function isPrime($n)
{
    if ($n === 1) return false;
    $rmax = (int) floor(sqrt($n));
    for ($i = 2; $i <= $rmax; $i++) {
        if ($n % $i === 0) return false;
    }
    return true;
}

function primes($max)
{
    $arr = [];
    for ($i = 2; $i <= $max; $i++) {
        if (isPrime($i)) $arr[] = $i;
    }
    return $arr;
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

// 最大公約数（2つ）
function gcd($m, $n)
{
    if (!$n) return $m;
    return gcd($n, $m % $n);
}

// 最大公約数（3つ以上）
function gcdAll($arr)
{
    $gcd = $arr[0];
    for ($i = 0; $i < count($arr); $i++) {
        $gcd = gcd($gcd, $arr[$i]);
    }
    return $gcd;
}

// 最小公倍数（2つ）
function lcm($m, $n)
{
    return $m * $n / gcd($m, $n);
}

// 最小公倍数（3つ以上）
function lcmAll($arr)
{
    $lcm = $arr[0];
    for ($i = 0; $i < count($arr); $i++) {
        $lcm = lcm($lcm, $arr[$i]);
    }
    return $lcm;
}

exit();

fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$q = new SplPriorityQueue;
for ($i = 0; $i < $n; $i++) {
    $q->insert($i + 1, -$a[$i]);
}
while ($q->count() > 0) {
    echo $q->extract() . ' ';
}

exit();

fscanf(STDIN, '%d %d', $n, $k);
$h = array_map('intval', explode(' ', trim(fgets(STDIN))));
$res = 0;
for ($i = 0; $i < $n; $i++) {
    if ($h[$i] >= $k) $res++;
}
echo $res . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$res = ceil($n / 2) / $n;
echo $res . PHP_EOL;
