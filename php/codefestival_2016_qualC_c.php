<?php

const MOD = 10 ** 9 + 7;
list($n) = ints();
$t = ints();
$a = ints();
$t[-1] = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($t[$i] > $t[$i - 1]) {
        $ht[$i] = [$t[$i], $t[$i]];
    } else {
        $ht[$i] = [1, $t[$i]];
    }
}
$a[$n] = 0;
for ($i = $n - 1; $i >= 0; --$i) {
    if ($a[$i] > $a[$i + 1]) {
        $ha[$i] = [$a[$i], $a[$i]];
    } else {
        $ha[$i] = [1, $a[$i]];
    }
}
$cnt = 1;
for ($i = 0; $i < $n; ++$i) {
    $cnt *= max(0, min($ht[$i][1], $ha[$i][1]) - max($ht[$i][0], $ha[$i][0]) + 1);
    $cnt %= MOD;
}

echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
