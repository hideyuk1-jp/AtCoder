<?php
// DFS（幅優先探索）：到達可能か
// グラフ：頂点と辺の総数、スタートの頂点、ゴールの頂点のあと改行して改行区切りの辺の集合
fscanf(STDIN, '%d %d %d %d', $n, $m, $s, $t);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $g[$a][] = $b; // 有向グラフ
}

$seen = array_fill(0, $n, false); // 到達可能かを格納する配列

dfs($g, $s, $seen);

if ($seen[$t]) echo 'YES'.PHP_EOL;
else echo 'NO'.PHP_EOL;

function dfs($g, $v = 0, &$seen) {
    $seen[$v] = true;

    if (is_null($g[$v])) return;
    foreach ($g[$v] as $next_v) {
        if ($seen[$next_v]) continue;
        dfs($g, $next_v, $seen);
    }
}