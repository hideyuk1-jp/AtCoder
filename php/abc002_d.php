<?php

list($n, $m) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($x, $y) = ints();
    --$x;
    --$y;
    $g[$x][$y] = true;
    $g[$y][$x] = true;
}
$max = 1;
for ($i = 0; $i < (1 << $n); ++$i) {
    $member = [];
    for ($j = 0; $j < $n; ++$j) {
        if ($i >> $j & 1) {
            $member[] = $j;
        }
    }
    $l = count($member);
    for ($j = 0; $j < $l - 1; ++$j) {
        for ($k = $j + 1; $k < $l; ++$k) {
            if (!isset($g[$member[$j]][$member[$k]])) {
                continue 3;
            }
        }
    }
    $max = max($max, $l);
}
echo $max, PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
