<?php

// ABC061_D
list($n, $m) = ints();
$bf = new BellmanFord($n, $m);
for ($i = 0; $i < $m; ++$i) {
    list($a, $b, $c) = ints();
    --$a;
    --$b;
    $c = -$c; // 最小値を求める問題に変換
    $bf->connect($a, $b, $c);
}
$bf->solve();
if (!$bf->negative[0][$n - 1]) {
    echo -$bf->dist(0, $n - 1);
} else {
    echo 'inf';
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// 最短経路探索
// 負の経路がある場合も使える
class BellmanFord
{
    private $n;
    private $d; // 最短距離を格納
    private $m; // 辺の数
    private $from;
    private $to;
    private $cost; // ノード間の距離を格納
    public $negative;

    public function __construct($n, $m)
    {
        $this->n = $n;
        $this->m = $m;
    }
    public function connect($x, $y, $w)
    {
        $this->from[] = $x;
        $this->to[] = $y;
        $this->cost[] = $w;
    }

    public function solve($s = 0)
    {
        $n = $this->n;
        $d = $this->d;
        $m = $this->m;
        $from = $this->from;
        $to = $this->to;
        $cost = $this->cost;
        $d[$s] = array_fill(0, $n, INF);
        $d[$s][$s] = 0;
        for ($k = 1; $k <= $n - 1; ++$k) {
            for ($i = 0; $i < $m; ++$i) {
                if ($d[$s][$to[$i]] > $d[$s][$from[$i]] + $cost[$i]) {
                    $d[$s][$to[$i]] = $d[$s][$from[$i]] + $cost[$i];
                }
            }
        }

        $negative = $this->negative;
        $negative[$s] = array_fill(0, $n, false);
        for ($k = 1; $k <= $n; ++$k) {
            for ($i = 0; $i < $m; ++$i) {
                if ($d[$s][$to[$i]] > $d[$s][$from[$i]] + $cost[$i]) {
                    $d[$s][$to[$i]] = $d[$s][$from[$i]] + $cost[$i];
                    $negative[$s][$to[$i]] = $negative[$s][$from[$i]] = true;
                }
            }
        }

        $this->d = $d;
        $this->negative = $negative;
    }

    public function dist($x, $y)
    {
        return $this->d[$x][$y];
    }
}
