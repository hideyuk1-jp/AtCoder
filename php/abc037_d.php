<?php

const MOD = 10 ** 9 + 7;
$di = [-1, 0, 1, 0];
$dj = [0, 1, 0, -1];
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) {
    $a[] = ints();
}
$ans = 0;
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        $ans += 1 + dfs($i, $j);
        $ans %= MOD;
    }
}
echo $ans;
function dfs($i, $j)
{
    global $h, $w, $di, $dj, $a, $memo;
    if (isset($memo[$i][$j])) {
        return $memo[$i][$j];
    }

    $res = 0;
    for ($dir = 0; $dir < 4; ++$dir) {
        $ni = $i + $di[$dir];
        $nj = $j + $dj[$dir];
        if ($ni < 0 || $ni > $h - 1) {
            continue;
        }
        if ($nj < 0 || $nj > $w - 1) {
            continue;
        }
        if ($a[$ni][$nj] > $a[$i][$j]) {
            $res += dfs($ni, $nj) + 1;
            $res %= MOD;
        }
    }
    $memo[$i][$j] = $res;
    return $memo[$i][$j];
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
