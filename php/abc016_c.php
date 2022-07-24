<?php

list($n, $m) = ints();
$wf = new WarshallFloyd(10);
for ($i = 0; $i < $m; ++$i) {
    list($a, $b) = ints();
    $a--; // 0スタートに合わせる
    $b--;
    $wf->connect($a, $b, 1);
    $wf->connect($b, $a, 1);
}
$wf->solve();
$ans = array_fill(0, $n, 0);
for ($i = 0; $i < $n; ++$i) {
    for ($j = 0; $j < $n; ++$j) {
        if ($wf->dist($i, $j) === 2) {
            $ans[$i]++;
        }
    }
}
echo implode(PHP_EOL, $ans) . PHP_EOL;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

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
        for ($k = 0; $k < $this->n; ++$k) { // 経由点
            for ($i = 0; $i < $this->n; ++$i) { // 始点
                for ($j = 0; $j < $this->n; ++$j) { // 終点
                    $this->d[$i][$j] = min($this->d[$i][$j], $this->d[$i][$k] + $this->d[$k][$j]);
                }
            }
        }
    }

    public function dist($x, $y)
    {
        return $this->d[$x][$y];
    }
}
