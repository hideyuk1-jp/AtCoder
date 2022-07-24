<?php

[$n, $m] = ints();
$wf = new WarshallFloyd($n);
for ($i = 0; $i < $m; ++$i) {
    [$a, $b, $c] = ints();
    $a--; // 0スタートに合わせる
    $b--;
    $wf->connect($a, $b, $c);
}
echo $wf->solve();

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
        $s = 0;
        for ($k = 0; $k < $n; ++$k) { // 経由点
            $dk = &$d[$k];
            for ($i = 0; $i < $n; ++$i) { // 始点
                $di = &$d[$i];
                for ($j = 0; $j < $n; ++$j) { // 終点
                    if ($di[$k] + $dk[$j] < $di[$j]) {
                        $di[$j] = $di[$k] + $dk[$j];
                    }
                }
            }
            for ($i = 0; $i < $n; ++$i) { // 始点
                $di = &$d[$i];
                for ($j = 0; $j < $n; ++$j) { // 終点
                    if ($di[$j] < INF) {
                        $s += $di[$j];
                    }
                }
            }
        }
        $this->d = $d;
        return $s;
    }

    public function dist($x, $y)
    {
        return $this->d[$x][$y];
    }
}
