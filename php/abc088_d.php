<?php

// 縦h x 横w の迷路を木構造に変換（壁=# 道=.）
define('BLACK', '#');
define('WHITE', '.');
fscanf(STDIN, '%d %d', $h, $w);
for ($i  = 0; $i < $h; $i++) {
    $s[] = trim(fgets(STDIN));
}
$g = array_fill(0, $h * $w, []);
$cnt_w = 0;
for ($i  = 0; $i < $h * $w; $i++) {
    $l = intdiv($i, $w);
    $m = $i % $w;

    if ($s[$l][$m] === BLACK) {
        continue;
    }

    $cnt_w++;
    if ($m < $w - 1 && $s[$l][$m + 1] === WHITE) {
        $g[$i][] = $i + 1;
        $g[$i + 1][] = $i;
    }

    if ($l < $h - 1 && $s[$l + 1][$m] === WHITE) {
        $g[$i][] = $i + $w;
        $g[$i + $w][] = $i;
    }
}

// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$n = $h * $w;
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[0] = 0; // 頂点0からの距離格納配列
$q->enqueue(0); // キューに0を追加

while (!$q->isEmpty()) {
    $v = $q->dequeue();

    foreach ($g[$v] as $next_v) {
        if ($dist[$next_v] !== -1) {
            continue;
        } // 発見済み

        $dist[$next_v] = $dist[$v] + 1;
        $q->enqueue($next_v);
    }
}
if ($dist[$h * $w - 1] === -1) {
    exit('-1');
}
echo $cnt_w - 2 - ($dist[$h * $w - 1] - 1);
