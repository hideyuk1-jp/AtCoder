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
    echo($s[$r[$i]] - $s[$l[$i] - 1]) . PHP_EOL;
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
function primeFactor($n)
{
    $res = [];
    if ($n === 1) {
        return $res;
    }

    // 何回も呼ぶ場合は前処理検討
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

// 素数関係
class Prime
{
    private $n;
    private $table; // 素数の添字にtrueが格納された配列

    public function __construct($n)
    {
        $this->n = $n;
        $this->makeTable();
    }

    public function makeTable()
    {
        $n = $this->n;
        $table = array_fill(2, $n - 1, true);
        $rn = (int) floor(sqrt($n));
        for ($i = 2; $i <= $rn; $i++) {
            if (!isset($table[$i])) {
                continue;
            }
            for ($j = 2 * $i; $j <= $n; $j += $i) {
                unset($table[$j]);
            }
        }
        $this->table = $table;
    }

    // 素数
    public function primes()
    {
        return array_keys($this->table);
    }

    public function table()
    {
        return $this->table;
    }

    // 素数判定
    public function isPrime($x)
    {
        return isset($this->table[$x]);
    }

    // 素因数分解
    public function factor($x)
    {
        $res = [];
        if ($x === 1) {
            return $res;
        }
        $primes = $this->primes();
        foreach ($primes as $prime) {
            while ($x % $prime === 0) {
                if (isset($res[$prime])) {
                    $res[$prime]++;
                } else {
                    $res[$prime] = 1;
                }
                $x /= $prime;
            }
        }
        if ($x > 1) {
            if (isset($res[$x])) {
                $res[$x]++;
            } else {
                $res[$x] = 1;
            }
        }
        return $res;
    }
}
