<?php

define('MOD', 10 ** 9 + 7);
list($n) = ints();
list($a, $b) = ints();
$a--;
$b--;
list($m) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($x, $y) = ints();
    $x--; // 0スタートに合わせる
    $y--;
    $g[$x][] = $y;
    $g[$y][] = $x; // 無向グラフの場合
}

// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）
$comb = array_fill(0, $n, 0); // 最短経路の組み合わせ数を格納する配列

$dist[$a] = 0; // スタート頂点の距離格納
$comb[$a] = 1; // スタート頂点の組み合わせ数格納
$q->enqueue($a); // キューに0を追加

while (!$q->isEmpty()) {
    $v = $q->dequeue();

    foreach ($g[$v] as $next_v) {
        // 最短経路の場合は親の組み合わせ数を加算
        if ($dist[$next_v] === -1 || $dist[$next_v] === $dist[$v] + 1) {
            $comb[$next_v] = ($comb[$next_v] + $comb[$v]) % MOD;
        }
        if ($dist[$next_v] !== -1) {
            continue;
        } // 発見済み
        $dist[$next_v] = $dist[$v] + 1;
        $q->enqueue($next_v);
    }
}
echo $comb[$b] . PHP_EOL;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
