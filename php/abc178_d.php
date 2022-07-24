<?php

const MOD = 10 ** 9 + 7;
list($s) = ints();
echo dfs();
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function dfs($sum = 0)
{
    global $s, $memo;
    if (isset($memo[$sum])) {
        return $memo[$sum];
    }
    if ($sum > $s) {
        return 0;
    }
    if ($sum === $s) {
        return 1;
    }
    $res = 0;
    for ($i = 3; $i <= $s - $sum; ++$i) {
        $res += dfs($sum + $i);
        $res %= MOD;
    }
    $memo[$sum] = $res;
    return $res;
}
