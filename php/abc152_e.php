<?php
define('MOD', 10 ** 9 + 7);
list($n) = ints();
$p = new Prime((int) sqrt(10 ** 6) + 1);
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    $pfs = $p->factor($a[$i]);
    foreach ($pfs as $k => $v) {
        if (isset($cnt[$k])) $cnt[$k] = max($cnt[$k], $v);
        else $cnt[$k] = $v;
    }
}
$lcm = 1;
foreach ($cnt as $k => $v) $lcm = modMul($lcm, modPow($k, $v));
$ans = 0;
for ($i = 0; $i < $n; ++$i) $ans = modAdd($ans, modDiv($lcm, $a[$i]));
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

// 素数関係
class Prime
{
    private $n;
    private $table; // 素数の添字にtrueが格納された配列

    function __construct($n)
    {
        $this->n = $n;
        $this->makeTable();
    }

    function makeTable()
    {
        $n = $this->n;
        $table = array_fill(2, $n - 1, true);
        $rn = (int) floor(sqrt($n));
        for ($i = 2; $i <= $rn; $i++) {
            if (!isset($table[$i])) continue;
            for ($j = 2 * $i; $j <= $n; $j += $i) {
                unset($table[$j]);
            }
        }
        $this->table = $table;
    }

    // 素数
    function primes()
    {
        return array_keys($this->table);
    }

    function table()
    {
        return $this->table;
    }

    // 素数判定
    function isPrime($x)
    {
        return isset($this->table[$x]);
    }

    // 素因数分解
    function factor($x)
    {
        $res = [];
        if ($x === 1) return $res;
        $primes = $this->primes();
        foreach ($primes as $prime) {
            while ($x % $prime === 0) {
                if (isset($res[$prime])) $res[$prime]++;
                else $res[$prime] = 1;
                $x /= $prime;
            }
        }
        if ($x > 1) {
            if (isset($res[$x])) $res[$x]++;
            else $res[$x] = 1;
        }
        return $res;
    }
}
