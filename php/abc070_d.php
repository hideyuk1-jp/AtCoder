<?php
list($n) = ints();
for ($i = 0; $i < $n - 1; ++$i) {
    list($a, $b, $c) = ints();
    --$a;
    --$b;
    $g[$a][$b] = $c;
    $g[$b][$a] = $c;
}
list($Q, $k) = ints();
--$k;
// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[$k] = 0; // 頂点0からの距離格納配列
$q->enqueue($k); // キューに0を追加

while (!$q->isEmpty()) {
    $v = $q->dequeue();

    foreach ($g[$v] as $next_v => $d) {
        if ($dist[$next_v] !== -1) continue; // 発見済み

        $dist[$next_v] = $dist[$v] + $d;
        $q->enqueue($next_v);
    }
}
for ($i = 0; $i < $Q; ++$i) {
    list($x, $y) = ints();
    --$x;
    --$y;
    echo ($dist[$x] + $dist[$y]) . PHP_EOL;
}

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
