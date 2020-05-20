<?php
// グラフ：頂点と辺の総数のあと改行して改行区切りの辺の集合
fscanf(STDIN, '%d %d', $n, $m);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $a--; // 0スタートに合わせる
    $b--;
    $g[$a][] = $b;
    $g[$b][] = $a; // 無向グラフの場合
}

// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[0] = 0; // 頂点0からの距離格納配列
$q->enqueue(0); // キューに0を追加

while (!$q->isEmpty()) {
    $v = $q->dequeue();

    foreach ($g[$v] as $next_v) {
        if ($dist[$next_v] !== -1) continue; // 発見済み

        $dist[$next_v] = $dist[$v] + 1;
        $q->enqueue($next_v);
    }
}

foreach ($dist as $i => $v) {
    echo $i . ': ' . $v . PHP_EOL;
}

// BFS：二部グラフ判定
$is_nipartite = true; // 二部グラフかどうか
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

for ($i = 0; $i < $n; $i++) {
    if ($dist[$i] !== -1) continue; // 発見済み
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

if ($is_nipartite) echo 'YES' . PHP_EOL;
else echo 'NO' . PHP_EOL;
