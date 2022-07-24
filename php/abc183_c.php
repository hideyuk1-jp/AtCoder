<?php

[$N, $K] = ints();
for ($i = 0; $i < $N; ++$i) {
    $T = ints();
    for ($j = 0; $j < $N; ++$j) {
        $g[$i][$j] = $T[$j];
        $g[$j][$i] = $T[$j];
    }
}
echo dfs();
function dfs($cur = 0, $d = 0, $visited = [])
{
    global $N, $K, $g;
    $visited[$cur] = true;
    if (count($visited) === $N) {
        if ($d + $g[0][$cur] === $K) {
            return 1;
        } else {
            return 0;
        }
    }
    $cnt = 0;
    for ($i = 0; $i < $N; ++$i) {
        if (isset($visited[$i])) {
            continue;
        }
        $cnt += dfs($i, $d + $g[$cur][$i], $visited);
    }
    return $cnt;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
