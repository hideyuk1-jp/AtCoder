<?php
list($n) = ints();
$a = ints();
$max = max($a);
if ($max === 1) exit('pairwise coprime');
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$a[$i]])) ++$cnt[$a[$i]];
    else $cnt[$a[$i]] = 1;
}
$p = new Prime($max);
$primes = $p->primes();
$maxc = 0;
foreach ($primes as $prime) {
    $c = 0;
    for ($j = $prime; $j <= $max; $j += $prime) {
        if (isset($cnt[$j])) $c += $cnt[$j];
    }
    $maxc = max($maxc, $c);
}
if ($maxc === $n) exit('not coprime');
if ($maxc === 1) exit('pairwise coprime');
echo 'setwise coprime';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
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
