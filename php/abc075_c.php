<?php

list($n, $m) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($a, $b) = ints();
    --$a;
    --$b;
    $h[] = [$a, $b];
    $g[$a][] = $b;
    $g[$b][] = $a;
}
$ans = 0;
for ($i = 0; $i < $m; ++$i) {
    // BFS（幅優先探索）：最短経路アルゴリズムとして活用
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

    $dist[0] = 0; // 頂点0からの距離格納配列
    $q->enqueue(0); // キューに0を追加

    while (!$q->isEmpty()) {
        $v = $q->dequeue();

        foreach ($g[$v] as $next_v) {
            if ($h[$i][0] === $v && $h[$i][1] === $next_v) {
                continue;
            }
            if ($h[$i][1] === $v && $h[$i][0] === $next_v) {
                continue;
            }
            if ($dist[$next_v] !== -1) {
                continue;
            } // 発見済み

            $dist[$next_v] = $dist[$v] + 1;
            $q->enqueue($next_v);
        }
    }
    if (array_search(-1, $dist)) {
        $ans++;
    }
}
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
