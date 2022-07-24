<?php

// abc079_d
list($h, $w) = ints();
$d = new Dijkstra(10);
for ($i = 0; $i < 10; ++$i) {
    foreach (ints() as $j => $v) {
        $d->connect($i, $j, $v);
    }
}
for ($i = 0; $i < 10; ++$i) {
    $d->solve($i);
}
$ans = 0;
for ($i = 0; $i < $h; ++$i) {
    foreach (ints() as $v) {
        $ans += $v !== -1 ? $d->dist($v, 1) : 0;
    }
}
echo $ans . PHP_EOL;
// 各ノードから１までの
for ($i = 0; $i < 10; ++$i) {
    echo "Shortest root from ${i} to 1: ";
    echo implode(" -> ", $d->root($i, 1));
    echo " (" . $d->dist($i, 1) . ")" . PHP_EOL;
}

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
        $this->cost = array_fill(0, $this->n, array_fill(0, $this->n, INF));
    }

    public function connect($x, $y, $w)
    {
        $this->cost[$x][$y] = $w;
    }

    public function solve($s = 0)
    {
        $n = $this->n;
        $d = $this->d;
        $cost = $this->cost;
        $d[$s] = array_fill(0, $n, INF);
        $d[$s][$s] = 0;
        $used = array_fill(0, $n, false);
        while (true) {
            $v = -1;
            // 残りのノードのうち最短で到達出来るノードを選択
            for ($i = 0; $i < $n; ++$i) {
                if (!$used[$i] && $v === -1) {
                    $v = $i;
                } elseif (!$used[$i] && $d[$s][$i] < $d[$s][$v]) {
                    $v = $i;
                }
            }
            if ($v === -1) {
                break;
            }
            for ($i = 0; $i < $n; ++$i) {
                if ($d[$s][$i] > $d[$s][$v] + $cost[$v][$i]) {
                    $d[$s][$i] = $d[$s][$v] + $cost[$v][$i];
                }
            }
            $used[$v] = true;
        }
        $this->d = $d;
    }

    public function dist($x, $y)
    {
        return $this->d[$x][$y];
    }
}

// ノードsからの各ノードへの最短距離（経路も保持）
// 0->indexed
class Dijkstra2
{
    private $n;
    private $d; // 最短距離を格納
    private $cost; // ノード間の距離を格納
    private $root; // 最短経路を格納

    public function __construct($n)
    {
        $this->n = $n;
        $this->cost = array_fill(0, $this->n, array_fill(0, $this->n, INF));
    }

    public function connect($x, $y, $w)
    {
        $this->cost[$x][$y] = $w;
    }

    public function solve($s = 0)
    {
        $n = $this->n;
        $d = $this->d;
        $cost = $this->cost;
        $root = $this->root;
        $d[$s] = array_fill(0, $n, INF);
        $d[$s][$s] = 0;
        $root[$s] = array_fill(0, $n, [$s]); // 各ノードまでの最短経路を格納
        $used = array_fill(0, $n, false);
        while (true) {
            $v = -1;
            // 残りのノードのうち最短で到達出来るノードを選択
            for ($i = 0; $i < $n; ++$i) {
                if (!$used[$i] && $v === -1) {
                    $v = $i;
                } elseif (!$used[$i] && $d[$s][$i] < $d[$s][$v]) {
                    $v = $i;
                }
            }
            if ($v === -1) {
                break;
            }
            for ($i = 0; $i < $n; ++$i) {
                if ($d[$s][$i] > $d[$s][$v] + $cost[$v][$i]) {
                    $d[$s][$i] = $d[$s][$v] + $cost[$v][$i];
                    $root[$s][$i] = array_merge($root[$s][$v], [$i]);
                }
            }
            $used[$v] = true;
        }
        $this->d = $d;
        $this->root = $root;
    }

    public function dist($x, $y)
    {
        return $this->d[$x][$y];
    }

    public function root($x, $y)
    {
        return $this->root[$x][$y];
    }
}
