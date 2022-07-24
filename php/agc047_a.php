<?php

list($n) = ints();
$p = new Prime(25);
$p->makeTable();
for ($i = 0; $i < $n; ++$i) {
    list($a) = strs();
    $t = explode('.', $a);
    $t[1] = str_pad($t[1] ?? '0', 9, '0', STR_PAD_RIGHT);
    $a = $t[0] * 10 ** 9 + $t[1];
    if ($a > 0) {
        $f = $p->factor($a);
        $f2[] = $f[2] ?? 0;
        $f5[] = $f[5] ?? 0;
    } else {
        $f2[] = 18;
        $f5[] = 18;
    }
}
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    ++$cusum[min($f2[$i], 18)][min($f5[$i], 18)];
}
for ($i = 18; $i >= 0; --$i) {
    for ($j = 17; $j >= 0; --$j) {
        $cusum[$i][$j] += $cusum[$i][$j + 1];
    }
}
for ($j = 18; $j >= 0; --$j) {
    for ($i = 17; $i >= 0; --$i) {
        $cusum[$i][$j] += $cusum[$i + 1][$j];
    }
}
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    $s2 = max(0, 18 - $f2[$i]);
    $s5 = max(0, 18 - $f5[$i]);
    $ans += $cusum[$s2][$s5];
    if ($f2[$i] >= $s2 && $f5[$i] >= $s5) {
        --$ans;
    }
}
echo $ans / 2;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
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
