<?php

list($n, $m, $x, $y) = ints();
--$x;
--$y;
$d = new Dijkstra($n);
for ($i = 0; $i < $m; ++$i) {
    list($a, $b, $t, $k) = ints();
    --$a;
    --$b;
    $d->connect($a, $b, $t, $k);
}
$d->solve($x);
echo $d->dist($x, $y) !== INF ? $d->dist($x, $y) : -1;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// ノードsからの各ノードへの最短距離
// 0->indexed
class Dijkstra
{
    private $n;
    private $d; // 最短距離を格納
    private $cost; // ノード間の距離を格納

    public function __construct($n)
    {
        $this->n = $n;
        $this->cost = array_fill(0, $this->n, array_fill(0, $this->n, [INF, 1]));
    }

    public function connect($x, $y, $w, $k)
    {
        $this->cost[$x][$y] = [$w, $k];
        $this->cost[$y][$x] = [$w, $k];
    }

    public function solve($s = 0)
    {
        $n = $this->n;
        $d = $this->d;
        $cost = $this->cost;
        $d[$s] = array_fill(0, $n, INF);
        $d[$s][$s] = 0;
        $q = new SplPriorityQueue();
        for ($i = 0; $i < $n; ++$i) {
            if ($i === $s) {
                continue;
            }
            $q->insert([$i, $cost[$s][$i]], -$cost[$s][$i][0]);
        }
        while (true) {
            if ($q->isEmpty()) {
                break;
            }
            [$v, [$t, $k]] = $q->extract();
            var_dump($v);
            for ($i = 0; $i < $n; ++$i) {
                if ($d[$s][$i] > $d[$s][$v] + $t + ($k - $d[$s][$v] % $k) % $k) {
                    $d[$s][$i] = $d[$s][$v] + $t + ($k - $d[$s][$v] % $k) % $k;
                }
            }
        }
        $this->d = $d;
    }

    public function dist($x, $y)
    {
        return $this->d[$x][$y];
    }
}
