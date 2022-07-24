<?php

list($n) = ints();
for ($i = 0; $i < $n - 1; ++$i) {
    list($a, $b) = ints();
    $g[$a][] = $b;
    $g[$b][] = $a;
}
// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplMinHeap(); // キューを用意
$dist = array_fill(1, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[1] = 0;
$q->insert(1); // キューに始点を追加
$ans = [];
while (!$q->isEmpty()) {
    $v = $q->extract();
    $ans[] = $v;
    foreach ($g[$v] as $next_v) {
        if ($dist[$next_v] !== -1) {
            continue;
        } // 発見済み
        $dist[$next_v] = $dist[$v] + 1;
        $q->insert($next_v);
    }
}
echo implode(' ', $ans), PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
