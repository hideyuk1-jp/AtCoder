<?php

// ワーシャルフロイド
// abc079_d
list($h, $w) = ints();
$wf = new WarshallFloyd(10);
for ($i = 0; $i < 10; ++$i) {
    foreach (ints() as $j => $v) {
        $wf->connect($i, $j, $v);
    }
}
$wf->solve();
$ans = 0;
for ($i = 0; $i < $h; ++$i) {
    foreach (ints() as $v) {
        $ans += $v !== -1 ? $wf->dist($v, 1) : 0;
    }
}
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// 全てのノード間の最短距離を求める
// 0-indexed
class WarshallFloyd
{
    private $n;
    private $d;

    public function __construct($n)
    {
        $this->n = $n;
        $this->d = array_fill(0, $this->n, array_fill(0, $this->n, INF));
        for ($i = 0; $i < $this->n; ++$i) {
            $this->d[$i][$i] = 0;
        }
    }

    public function connect($x, $y, $w)
    {
        $this->d[$x][$y] = $w;
    }

    public function solve()
    {
        $n = $this->n;
        $d = $this->d;
        for ($k = 0; $k < $n; ++$k) { // 経由点
            for ($i = 0; $i < $n; ++$i) { // 始点
                for ($j = 0; $j < $n; ++$j) { // 終点
                    $d[$i][$j] = min($d[$i][$j], $d[$i][$k] + $d[$k][$j]);
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
