<?php

list($n, $x) = ints();
--$x;
$h = ints();
for ($i = 0; $i < $n - 1; ++$i) {
    list($a[$i], $b[$i]) = ints();
    --$a[$i];
    --$b[$i];
    $gm[$a[$i]][$b[$i]] = 1;
    $gm[$b[$i]][$a[$i]] = 1;
}
$cnt = $n - 1;
for ($i = 0; $i < $n - 1; ++$i) {
    $g = $gm;
    unset($g[$a[$i]][$b[$i]]);
    unset($g[$b[$i]][$a[$i]]);
    bfs($x);
    for ($j = 0; $j < $n; ++$j) {
        if ($h[$j] === 1 && $dist[$j] === -1) {
            continue 2;
        }
    }
    --$cnt;
}
echo $cnt * 2 . PHP_EOL;
function bfs($s = 0)
{
    global $n, $g, $dist;
    // BFS（幅優先探索）：最短経路アルゴリズムとして活用
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

    $dist[$s] = 0; // 頂点0からの距離格納配列
    $q->enqueue($s); // キューに0を追加

    while (!$q->isEmpty()) {
        $v = $q->dequeue();

        foreach ($g[$v] as $next_v => $cost) {
            if ($dist[$next_v] !== -1) {
                continue;
            } // 発見済み

            $dist[$next_v] = $dist[$v] + $cost;
            $q->enqueue($next_v);
        }
    }
}

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
