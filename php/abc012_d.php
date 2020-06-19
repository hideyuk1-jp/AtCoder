<?php
list($n, $m) = ints();
$d = new Dijkstra($n);
for ($i = 0; $i < $m; ++$i) {
    list($a, $b, $t) = ints();
    --$a;
    --$b;
    $d->connect($a, $b, $t);
    $d->connect($b, $a, $t);
}
for ($i = 0; $i < $n; ++$i) $d->solve($i);
$ans = PHP_INT_MAX;
for ($i = 0; $i < $n; ++$i) {
    $max = 0;
    for ($j = 0; $j < $n; ++$j) $max = max($max, $d->dist($i, $j));
    $ans = min($ans, $max);
}
echo $ans . PHP_EOL;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// ノードsからの各ノードへの最短距離
// 0-indexed
class Dijkstra
{
    private $n;
    private $d; // 最短距離を格納
    private $cost; // ノード間の距離を格納
    //private $root; // 最短経路を格納

    function __construct($n)
    {
        $this->n = $n;
        $this->cost = array_fill(0, $this->n, array_fill(0, $this->n, INF));
    }

    function connect($x, $y, $w)
    {
        $this->cost[$x][$y] = $w;
    }

    function solve($s = 0)
    {
        $this->d[$s] = array_fill(0, $this->n, INF);
        $this->d[$s][$s] = 0;
        //$this->root[$s] = array_fill(0, $this->n, [$s]); // 各ノードまでの最短経路を格納
        $used = array_fill(0, $this->n, false);
        while (true) {
            $v = -1;
            // 残りのノードのうち最短で到達出来るノードを選択
            for ($i = 0; $i < $this->n; ++$i) {
                if (!$used[$i] && $v === -1) $v = $i;
                elseif (!$used[$i] && $this->d[$s][$i] < $this->d[$s][$v]) $v = $i;
            }
            if ($v === -1) break;
            for ($i = 0; $i < $this->n; ++$i) {
                if ($this->d[$s][$i] > $this->d[$s][$v] + $this->cost[$v][$i]) {
                    $this->d[$s][$i] = $this->d[$s][$v] + $this->cost[$v][$i];
                    //$this->root[$s][$i] = array_merge($this->root[$s][$v], [$i]);
                }
            }
            $used[$v] = true;
        }
    }

    function dist($x, $y)
    {
        return $this->d[$x][$y];
    }
    /*
    function root($x, $y)
    {
        return $this->root[$x][$y];
    }
    */
}
