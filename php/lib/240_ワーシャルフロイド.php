<?php
// ワーシャルフロイド
// abc079_d
list($h, $w) = ints();
$wf = new WarshallFloyd(10);
for ($i = 0; $i < 10; ++$i)
    foreach (ints() as $j => $v) $wf->connect($i, $j, $v);
$wf->solve();
$ans = 0;
for ($i = 0; $i < $h; ++$i)
    foreach (ints() as $v) $ans += $v !== -1 ? $wf->dist($v, 1) : 0;
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

class WarshallFloyd
{
    private $n;
    private $d;

    function __construct($n)
    {
        $this->n = $n;
        $this->d = array_fill(0, $this->n, array_fill(0, $this->n, INF));
        for ($i = 0; $i < $this->n; ++$i) $this->d[$i][$i] = 0;
    }

    function connect($x, $y, $w)
    {
        $this->d[$x][$y] = $w;
    }

    function solve()
    {
        for ($k = 0; $k < $this->n; ++$k) { // 経由点
            for ($i = 0; $i < $this->n; ++$i) { // 始点
                for ($j = 0; $j < $this->n; ++$j) { // 終点
                    $this->d[$i][$j] = min($this->d[$i][$j], $this->d[$i][$k] + $this->d[$k][$j]);
                }
            }
        }
    }

    function dist($x, $y)
    {
        return $this->d[$x][$y];
    }
}
