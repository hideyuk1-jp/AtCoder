<?php

list($n) = ints();
for ($i = 0; $i < $n - 1; ++$i) {
    list($a, $b) = ints();
    $a--; // 0スタートに合わせる
    $b--;
    $g[$a][] = $b;
    $g[$b][] = $a; // 無向グラフの場合
}
$c = ints();
rsort($c);
// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[0] = 0; // 頂点0からの距離格納配列
$q->enqueue(0); // キューに0を追加
$i = 0;
while (!$q->isEmpty()) {
    $v = $q->dequeue();
    $d[$v] = $c[$i];
    ++$i;
    foreach ($g[$v] as $next_v) {
        if ($dist[$next_v] !== -1) {
            continue;
        } // 発見済み

        $dist[$next_v] = $dist[$v] + 1;
        $q->enqueue($next_v);
    }
}
ksort($d);
$m = array_sum($c) - max($c);
echo $m . PHP_EOL;
echo implode(' ', $d);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
