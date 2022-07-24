<?php

list($n, $m) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($b[$i]) = strs();
    $b[$i] = array_map('intval', str_split($b[$i]));
    $a[] = array_fill(0, $m, 0);
}
for ($i = 1; $i < $n - 1; ++$i) {
    for ($j = 1; $j < $m - 1; ++$j) {
        // 上下左右の最小値を調べる
        $min = PHP_INT_MAX;
        foreach ([[-1, 0], [1, 0], [0, -1], [0, 1]] as list($p, $q)) {
            $min = min($min, $b[$i + $p][$j + $q]);
        }
        $a[$i][$j] = $min;
        foreach ([[-1, 0], [1, 0], [0, -1], [0, 1]] as list($p, $q)) {
            $b[$i + $p][$j + $q] -= $min;
        }
    }
}
foreach ($a as $aa) {
    echo implode('', $aa) . PHP_EOL;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
