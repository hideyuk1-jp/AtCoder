<?php

list($n, $m) = ints();
$a = ints();
for ($i = 0; $i < $m; ++$i) {
    $x = ints();
    $b[$i] = $x[0];
    foreach (array_slice($x, 2) as $v) {
        $comb[$i][--$v] = true;
    }
}
echo dfs() . PHP_EOL;
function dfs($d = 0, $selected = [])
{
    global $n;
    if ($d === 9) {
        return calcScore($selected);
    }
    $s = count($selected) ? max($selected) + 1 : 0;
    for ($i = $s; $i < $n - 9 + $d + 1; ++$i) {
        $a[] = dfs($d + 1, array_merge($selected, [$i]));
    }
    return max($a);
}
function calcScore($selected)
{
    global $m, $a, $b, $comb;
    $score = 0;
    $cnt = array_fill(0, $m, 0);
    foreach ($selected as $i) {
        $score += $a[$i];
        for ($j = 0; $j < $m; ++$j) {
            if (isset($comb[$j][$i])) {
                ++$cnt[$j];
            }
        }
    }
    foreach ($cnt as $i => $c) {
        if ($c >= 3) {
            $score += $b[$i];
        }
    }
    return $score;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
