<?php

// 親方向のノードと、子方向のノードの数を1回のdfsで求める
fscanf(STDIN, '%d', $n);
for ($i  = 1; $i < $n; $i++) {
    fscanf(STDIN, '%d', $p);
    $g[$i][] = $p;
    $g[$p][] = $i;
}
$ans = array_fill(0, $n, 0);
dfs();
echo implode(PHP_EOL, $ans), PHP_EOL;

function dfs($parent = -1, $d = 0)
{
    global $n, $g, $ans;
    // 子方向
    $cnt = 1; // d の分
    foreach ($g[$d] as $next) {
        if ($parent === $next) {
            continue;
        }
        $tmp = dfs($d, $next);
        $cnt += $tmp;
        $ans[$d] = max($ans[$d], $tmp);
    }
    // 親方向
    $ans[$d] = max($ans[$d], $n - $cnt);
    return $cnt;
}
