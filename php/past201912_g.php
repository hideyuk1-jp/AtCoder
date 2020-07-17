<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    for ($j = 0; $j <= $i; ++$j) {
        if ($i === $j) $a[$i][$j] = 0;
        else $a[$i][$j] = $a[$j][$i];
    }
    if ($i < $n - 1) $a[$i] = array_merge($a[$i], ints());
}
echo dfs();
function dfs($d = 0, $g = [[], [], []])
{
    global $n;
    if ($d === $n) return calcHappiness($g);
    for ($i = 0; $i < 3; ++$i) {
        $_g = $g;
        $_g[$i][] = $d;
        $res[] = dfs($d + 1, $_g);
    }
    return max($res);
}
function calcHappiness($g)
{
    global $a;
    $sum = 0;
    for ($k = 0; $k < 3; ++$k) {
        $l = count($g[$k]);
        for ($i = 0; $i < $l - 1; ++$i) {
            for ($j = $i + 1; $j < $l; ++$j) {
                $sum += $a[$g[$k][$i]][$g[$k][$j]];
            }
        }
    }
    return $sum;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
