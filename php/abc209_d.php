<?php

[$n, $q] = ints();
for ($i = 0; $i < $n - 1; ++$i) {
    [$a, $b] = ints();
    --$a;
    --$b;
    $g[$a][] = $b;
    $g[$b][] = $a;
}
bfs();
for ($i = 0; $i < $q; ++$i) {
    [$c, $d] = ints();
    --$c;
    --$d;
    $ans[] = $dist[$c] % 2 === $dist[$d] % 2 ? 'Town' : 'Road';
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function bfs()
{
    global $n, $g, $dist;
    // BFS（幅優先探索）：最短経路アルゴリズムとして活用
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）
    $dist[0] = 0; // 始点からの距離格納配列
    $q->enqueue(0); // キューに始点を追加
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
}
