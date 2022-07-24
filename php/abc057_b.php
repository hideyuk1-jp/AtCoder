<?php

list($n, $m) = ints();
for ($i = 0; $i < $n; ++$i) {
    $a[] = ints();
}
for ($i = 0; $i < $m; ++$i) {
    $c[] = ints();
}
for ($i = 0; $i < $n; ++$i) {
    $min_d = PHP_INT_MAX;
    $min_j = 0;
    for ($j = 0; $j < $m; ++$j) {
        $d = abs($c[$j][0] - $a[$i][0]) + abs($c[$j][1] - $a[$i][1]);
        if ($d < $min_d) {
            $min_d = $d;
            $min_j = $j;
        }
    }
    $ans[] = $min_j + 1;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
