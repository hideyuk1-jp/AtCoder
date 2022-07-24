<?php

[$N] = ints();
for ($i = 0; $i < $N; ++$i) {
    [$S[]] = strs();
}
echo dfs($N, true);
function dfs($d, $y)
{
    global $S, $memo;
    if ($d == 0) {
        return 1;
    }
    if (isset($memo[$d][$y])) {
        return $memo[$d][$y];
    }
    $cnt = 0;
    if ($S[$d - 1] === "AND") {
        if ($y) {
            $cnt += dfs($d - 1, true);
        } else {
            $cnt += dfs($d - 1, true);
            $cnt += 2 * dfs($d - 1, false);
        }
    } else {
        if ($y) {
            $cnt += 2 * dfs($d - 1, true);
            $cnt += dfs($d - 1, false);
        } else {
            $cnt += dfs($d - 1, false);
        }
    }
    $memo[$d][$y] = $cnt;
    return $cnt;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
