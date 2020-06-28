<?php
// 島が一つになっているかの判定をBFSを使って解き直し
define('ROAD', 'o');
define('WALL', 'x');
list($h, $w) = [10, 10];
$n = $h * $w;
for ($i = 0; $i < $h; ++$i) list($a[]) = strs();
$cntRoad = 0;
squares2Gragh($a);
$gb = $g;
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($a[$i][$j] === ROAD) continue;
        $g = $gb;
        $from = $i * $w + $j;
        connectGraph4($i, $j, $a);
        if (!isset($g[$from])) continue;
        $d = bfs($from);
        $cnt = 0;
        for ($k = 0; $k < $n; ++$k) if ($d[$k] > 0) ++$cnt;
        if ($cnt === $cntRoad) exit('YES' . PHP_EOL);
    }
}
echo 'NO' . PHP_EOL;
function bfs($s = 0)
{
    global $n, $g;
    // BFS（幅優先探索）：最短経路アルゴリズムとして活用
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

    $dist[$s] = 0; // 頂点0からの距離格納配列
    $q->enqueue($s); // キューに0を追加

    while (!$q->isEmpty()) {
        $v = $q->dequeue();
        foreach ($g[$v] as $next_v => $cost) {
            if ($dist[$next_v] !== -1) continue; // 発見済み

            $dist[$next_v] = $dist[$v] + $cost;
            $q->enqueue($next_v);
        }
    }
    return $dist;
}

// h x w のマス目の処理系
// マス目の文字列からグラフを作成
function squares2Gragh($a)
{
    global $g, $h, $w, $cntRoad;
    $g = array_fill(0, $h * $w, []);
    for ($i = 0; $i < $h; ++$i) {
        for ($j = 0; $j < $w; ++$j) {
            if ($a[$i][$j] === WALL) continue;
            ++$cntRoad;
            connectGraphRD($i, $j, $a);
        }
    }
}
// 右と下が道の場合にグラフの辺をはる
function connectGraphRD($i, $j, $a)
{
    global $g, $h, $w, $a;
    $from = $i * $w + $j;
    if ($i < $h - 1 && $a[$i + 1][$j] === ROAD) {
        $to = ($i + 1) * $w + $j;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
    if ($j < $w - 1 && $a[$i][$j + 1] === ROAD) {
        $to = $i * $w + $j + 1;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
}
// 4方向（上下左右）が道の場合にグラフの辺をはる
function connectGraph4($i, $j, $a)
{
    global $g, $h, $w;
    $from = $i * $w + $j;
    if ($i > 0 && $a[$i - 1][$j] === ROAD) {
        $to = ($i - 1) * $w + $j;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
    if ($j < $w - 1 && $a[$i][$j + 1] === ROAD) {
        $to = $i * $w + $j + 1;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
    if ($i < $h - 1 && $a[$i + 1][$j] === ROAD) {
        $to = ($i + 1) * $w + $j;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
    if ($j > 0 && $a[$i][$j - 1] === ROAD) {
        $to = $i * $w + $j - 1;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
}
// 4方向（斜め）が道の場合にグラフの辺をはる
function connectGraph4d($i, $j, $a)
{
    global $g, $h, $w;
    $from = $i * $w + $j;
    if ($i > 0 && $j > 0 && $a[$i - 1][$j - 1] === ROAD) {
        $to = ($i - 1) * $w + $j - 1;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
    if ($i > 0 && $j < $w - 1 && $a[$i - 1][$j + 1] === ROAD) {
        $to = ($i - 1) * $w + $j + 1;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
    if ($i < $h - 1 && $j < $w - 1 && $a[$i + 1][$j + 1] === ROAD) {
        $to = ($i + 1) * $w + $j + 1;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
    if ($i < $h - 1 && $j > 0 && $a[$i + 1][$j - 1] === ROAD) {
        $to = ($i + 1) * $w + $j - 1;
        $g[$from][$to] = 1;
        $g[$to][$from] = 1;
    }
}
// 8方向が道の場合にグラフの辺をはる
function connectGraph8($i, $j, $a)
{
    connectGraph4($i, $j, $a);
    connectGraph4d($i, $j, $a);
}

function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
