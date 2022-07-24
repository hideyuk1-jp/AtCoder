<?php

list($N, $T) = ints();
$t = ints();
$ans = 0;
$p = -1;
for ($i = 0; $i < $N; ++$i) {
    $ans += $T;
    if ($t[$i] < $p) {
        $ans -= $p - $t[$i];
    }
    $p = $t[$i] + $T;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
