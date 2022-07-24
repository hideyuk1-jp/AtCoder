<?php

list($n) = ints();

$wf = new WarshallFloyd($n);
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    for ($j = 0; $j < $n; ++$j) {
        if ($s[$j] === '1') {
            $g[$i][] = $j;
            $wf->connect($i, $j, 1);
        }
    }
}
if (!isNipartite()) {
    exit('-1');
}
$wf->solve();
$max = 0;
for ($i = 0; $i < $n - 1; ++$i) {
    for ($j = $i + 1; $j < $n; ++$j) {
        $max = max($max, $wf->dist($i, $j));
    }
}
echo $max + 1;
function isNipartite()
{
    global $n, $g, $dist;
    // BFS：二部グラフ判定
    $is_nipartite = true; // 二部グラフかどうか
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

    for ($i = 0; $i < $n; $i++) {
        if ($dist[$i] !== -1) {
            continue;
        } // 発見済み
        $dist[$i] = 0; // 頂点$iからの距離格納配列
        $q->enqueue($i); // キューに$iを追加
        while (!$q->isEmpty()) {
            $v = $q->dequeue();

            foreach ($g[$v] as $next_v) {
                if ($dist[$next_v] === -1) {
                    $dist[$next_v] = $dist[$v] + 1;
                    $q->enqueue($next_v);
                } else {
                    if ($dist[$next_v] === $dist[$v]) { // 隣接する頂点の距離が同じ場合二部グラフにならない
                        $is_nipartite = false;
                        break 3;
                    }
                }
            }
        }
    }
    return $is_nipartite;
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
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
