<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    $a = ints();
    for ($j = 0; $j < $n - 1; ++$j) {
        $x1 = $j > 0 ? min($i, $a[$j - 1] - 1) * $n + max($i, $a[$j - 1] - 1) : 0;
        $x2 = min($i, $a[$j] - 1) * $n + max($i, $a[$j] - 1);
        $g[$x1][] = $x2;
    }
}
$seen = array_fill(0, $n * $n, 0);
echo dfs();
function dfs($v = 0)
{
    global $g, $seen, $dist;
    if ($seen[$v] === 2) {
        return $dist[$v];
    }
    $seen[$v] = 1; // 行きがけ
    if (isset($g[$v])) {
        foreach ($g[$v] as $to) {
            if ($seen[$to] === 1) {
                exit('-1');
            } // 閉路あり
            $dist[$v] = max($dist[$v], dfs($to) + 1);
        }
    } else {
        $dist[$v] = 0;
    }
    $seen[$v] = 2; // 探索完了
    return $dist[$v];
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
