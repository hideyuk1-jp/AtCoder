<?php

[$n, $m] = ints();
for ($i = 0; $i < $m; ++$i) {
    [$a, $b] = ints();
    $a--; // 0スタートに合わせる
    $b--;
    $g[$a][] = $b; // 有向グラフ
}
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    $seen = array_fill(0, $n, 0); // 到達可能かを格納する配列
    dfs($i);
    $cnt += array_sum($seen);
}
echo $cnt;

function dfs($v = 0)
{
    global $g, $seen;
    $seen[$v] = 1;

    if (!isset($g[$v]) || is_null($g[$v])) {
        return;
    }
    foreach ($g[$v] as $to) {
        if ($seen[$to]) {
            continue;
        }
        dfs($to);
    }
}

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
