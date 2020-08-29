<?php
list($n) = ints();
$a = ints();
$p = new Prime(max($a));
$p->makeTable();
$is_pairwize = true;
$is_setwize = true;
for ($i = 0; $i < $n; ++$i) {
    $fs = array_keys($p->factor($a[$i]));
    foreach ($fs as $f) {
        if (isset($cnt[$f])) ++$cnt[$f];
        else $cnt[$f] = 1;
    }
}
if (max($cnt) === $n) exit('not coprime');
if (max($cnt) === 1) exit('pairwise coprime');
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
