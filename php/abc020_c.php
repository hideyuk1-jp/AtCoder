<?php
// 縦h x 横w の迷路を木構造に変換（壁=# 道=.）
define('WALL', '#');
define('ROAD', '.');
list($h, $w, $t) = ints();
for ($i  = 0; $i < $h; $i++) $s[] = trim(fgets(STDIN));
$ok = 1;
$ng = 10 ** 9;
while (abs($ok - $ng) > 1) {
    $mid = intdiv($ok + $ng, 2);
    $d = solve($mid);
    if ($d <= $t) $ok = $mid;
    else $ng = $mid;
}
echo $ok . PHP_EOL;

function solve($x)
{
    global $s, $h, $w;
    $dk = new Dijkstra($h * $w);
    for ($i  = 0; $i < $h * $w; $i++) {
        $l = intdiv($i, $w);
        $m = $i % $w;

        if ($s[$l][$m] === 'S') $S = $i;
        if ($s[$l][$m] === 'G') $G = $i;

        for ($j = -1; $j <= 1; ++$j) {
            if ($j === 0) continue;
            if ($l + $j >= 0 && $l + $j <= $h - 1) {
                if ($s[$l + $j][$m] === WALL) $dk->connect($i, $i + $j * $w, $x);
                else $dk->connect($i, $i + $j * $w, 1);
            }
            if ($m + $j >= 0 && $m + $j <= $w - 1) {
                if ($s[$l][$m + $j] === WALL) $dk->connect($i, $i + $j, $x);
                else $dk->connect($i, $i + $j, 1);
            }
        }
    }
    $dk->solve($S);
    return $dk->dist($S, $G);
}
// ノードsからの各ノードへの最短距離
// 0->indexed
class Dijkstra
{
    private $n;
    private $d; // 最短距離を格納
    public $cost; // ノード間の距離を格納

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
                if (!$used[$i] && $v === -1) $v = $i;
                elseif (!$used[$i] && $d[$s][$i] < $d[$s][$v]) $v = $i;
            }
            if ($v === -1) break;
            for ($i = 0; $i < $n; ++$i) {
                if ($d[$s][$i] > $d[$s][$v] + $cost[$v][$i]) {
                    $d[$s][$i] = $d[$s][$v] + $cost[$v][$i];
                }
            }
            $used[$v] = true;
        }
        $this->d = $d;
    }

    function dist($x, $y)
    {
        return $this->d[$x][$y];
    }
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
