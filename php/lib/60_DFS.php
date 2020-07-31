<?php
// DFS（幅優先探索）：到達可能か
// グラフ：頂点と辺の総数、スタートの頂点、ゴールの頂点のあと改行して改行区切りの辺の集合
fscanf(STDIN, '%d %d %d %d', $n, $m, $s, $t);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $a--; // 0スタートに合わせる
    $b--;
    $g[$a][] = $b; // 有向グラフ
}

$seen = array_fill(0, $n, false); // 到達可能かを格納する配列

dfs($s);

if ($seen[$t]) echo 'YES' . PHP_EOL;
else echo 'NO' . PHP_EOL;

function dfs($v = 0)
{
    global $g, $seen;
    $seen[$v] = true;

    if (is_null($g[$v])) return;
    foreach ($g[$v] as $to) {
        if ($seen[$to]) continue;
        dfs($to);
    }
}
exit;

// 閉路検出
$seen = array_fill(0, $n, 0); // 0:未探索 1:行きがけ 2:探索済
function dfs2($v = 0)
{
    global $g, $seen;
    $seen[$v] = 1; // 行きがけ
    if (is_null($g[$v])) return;
    foreach ($g[$v] as $to) {
        if ($seen[$to] === 1) exit('-1'); // 閉路検出
        if ($seen[$to] === 2) continue;
        dfs($to);
    }
    $seen[$v] = 2; // 探索済
}
