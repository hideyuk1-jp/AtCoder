<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($x[], $y[], $p[]) = ints();
}
for ($i = 0; $i < 2 ** $n; ++$i) {
    $pc[$i] = popcount($i);
    for ($j = 0; $j < $n; ++$j) {
        if ($i >> $j & 1) {
            for ($k = 0; $k < $n; ++$k) {
                $distx[$i][$k] = min($distx[$i][$k] ?? abs($x[$k]), abs($x[$j] - $x[$k]));
                $disty[$i][$k] = min($disty[$i][$k] ?? abs($y[$k]), abs($y[$j] - $y[$k]));
            }
        } else {
            if (!isset($distx[$i][$j])) {
                $distx[$i][$j] = abs($x[$j]);
            }
            if (!isset($disty[$i][$j])) {
                $disty[$i][$j] = abs($y[$j]);
            }
        }
    }
}
$ans = array_fill(0, $n + 1, PHP_INT_MAX);
for ($i = 0; $i < 2 ** $n; ++$i) {
    $k = $pc[$i];
    $t = $i;
    while ($t) {
        $u = $t ^ $i;
        $ans[$k] = min($ans[$k], calcCost($t, $t ^ $i));
        $t = ($t - 1) & $i;
    }
    $ans[$k] = min($ans[$k], calcCost(0, $i));
}
echo implode(PHP_EOL, $ans);
function popcount($x)
{
    $res = 0;
    while ($x > 0) {
        $x &= $x - 1;
        ++$res;
    }
    return $res;
}
function calcCost($bitx, $bity)
{
    global $n, $distx, $disty, $p;
    $cost = 0;
    for ($i = 0; $i < $n; ++$i) {
        $cost += min($distx[$bitx][$i], $disty[$bity][$i]) * $p[$i];
    }
    return $cost;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
