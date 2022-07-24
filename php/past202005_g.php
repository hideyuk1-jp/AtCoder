<?php

list($n, $gx, $gy) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($x, $y) = ints();
    $block[$x + 201][$y + 201] = true;
}
$dx = [-1, -1, 0, 0, 1, 1];
$dy = [0, 1, -1, 1, 0, 1];

$q = new SplQueue(); // キューを用意
$dist = array_fill(0, 403, array_fill(0, 403, -1)); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[201][201] = 0; // 頂点0からの距離格納配列
$q->enqueue([201, 201]); // キューに0を追加

while (!$q->isEmpty()) {
    list($x, $y) = $q->dequeue();

    for ($i = 0; $i < 6; ++$i) {
        $nx = $x + $dx[$i];
        $ny = $y + $dy[$i];
        if (max($nx, $ny) >= 403 || min($nx, $ny) < 0) {
            continue;
        } // 範囲外
        if ($dist[$nx][$ny] !== -1) {
            continue;
        } // 発見済み
        if (isset($block[$nx][$ny])) {
            continue;
        } // 障害物
        $dist[$nx][$ny] = $dist[$x][$y] + 1;
        $q->enqueue([$nx, $ny]);
    }
}
echo $dist[$gx + 201][$gy + 201];
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
