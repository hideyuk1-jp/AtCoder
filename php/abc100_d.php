<?php

list($n, $m) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($x[], $y[], $z[]) = ints();
}
$max = PHP_INT_MIN;
for ($i = 0; $i < 2 ** 3; ++$i) {
    for ($j = 0; $j < 3; ++$j) {
        if ($i >> $j & 1) {
            $d[$j] = 1;
        } else {
            $d[$j] = -1;
        }
    }
    for ($j = 0; $j < $n; ++$j) {
        $t[$j] = $d[0] * $x[$j] + $d[1] * $y[$j] + $d[2] * $z[$j];
    }
    list($_x, $_y, $_z) = [$x, $y, $z];
    array_multisort($t, SORT_DESC, $_x, $_y, $_z);
    $_x = array_slice($_x, 0, $m);
    $_y = array_slice($_y, 0, $m);
    $_z = array_slice($_z, 0, $m);
    $max = max($max, score([array_sum($_x), array_sum($_y), array_sum($_z)]));
}
echo $max;
function score($a)
{
    return array_sum(array_map('abs', $a));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
