<?php

list($n, $m) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($u, $v) = ints();
    --$u;
    --$v;
    for ($j = 0; $j < 3; ++$j) {
        $from = $u * 3 + $j;
        $to = $v * 3 + ($j + 1) % 3;
        $g[$from][] = $to;
    }
}
list($s, $t) = ints();
--$s;
--$t;
$s *= 3;
$t *= 3;
// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, 3 * $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[$s] = 0; // 始点からの距離格納配列
$q->enqueue($s); // キューに始点を追加

while (!$q->isEmpty()) {
    $v = $q->dequeue();
    if (!isset($g[$v])) {
        continue;
    }
    foreach ($g[$v] as $next_v) {
        if ($dist[$next_v] !== -1) {
            continue;
        } // 発見済み

        $dist[$next_v] = $dist[$v] + 1;
        $q->enqueue($next_v);
    }
}
echo $dist[$t] !== -1 ? $dist[$t] / 3 : -1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
