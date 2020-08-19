<?php
list($n) = ints();
for ($i = 0; $i < $n - 1; ++$i) {
    list($a, $b) = ints();
    --$a;
    --$b;
    $g[$a][] = $b;
    $g[$b][] = $a;
}
$dist[0] = bfs(0);
$dist[$n - 1] = bfs($n - 1);
// 黒く塗れるマスが過半数の場合はFennecの勝ち
$cnt = 1; // 最初の自分のマス
for ($i = 1; $i < $n - 1; ++$i)
    if ($dist[0][$i] <= $dist[$n - 1][$i]) ++$cnt;
echo 2 * $cnt > $n ? 'Fennec' : 'Snuke';
// BFS（幅優先探索）：最短経路アルゴリズムとして活用
function bfs($s)
{
    global $n, $g;
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $n, INF); // 距離を格納する配列

    $dist[$s] = 0; // 始点からの距離格納配列
    $q->enqueue($s); // キューに始点を追加

    while (!$q->isEmpty()) {
        $v = $q->dequeue();

        foreach ($g[$v] as $next_v) {
            if ($dist[$next_v] !== INF) continue; // 発見済み
            if ($next_v === 0 || $next_v === $n - 1) continue; // 初期状態で塗られているマス
            $dist[$next_v] = $dist[$v] + 1;
            $q->enqueue($next_v);
        }
    }
    return $dist;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
