<?php

[$a, $b, $k] = ints();
$nCr = nCr($a + $b - 1);
echo dfs($a, $b, $k);
function dfs($a, $b, $k, $s = '')
{
    global $nCr;
    if ($a + $b === 0) {
        return $s;
    }
    $cnt = $nCr[$a + $b - 1][$a - 1] ?? 0;
    if ($cnt >= $k) {
        return dfs($a - 1, $b, $k, $s . 'a');
    } else {
        return dfs($a, $b - 1, $k - $cnt, $s . 'b');
    }
}
function nCr($max)
{
    $pascal[0][0] = 1;
    for ($j = 1; $j <= $max; $j++) {
        for ($i = 0; $i <= $j; $i++) {
            $pascal[$j][$i] = ($pascal[$j - 1][$i - 1] ?? 0) + ($pascal[$j - 1][$i] ?? 0);
        }
    }
    return $pascal;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
