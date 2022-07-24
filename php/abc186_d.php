<?php

[$N] = ints();
$a = ints();
sort($a);
$sum = array_sum($a);
$ans = 0;
for ($i = 0; $i < $N - 1; ++$i) {
    $sum -= $a[$i];
    $ans += $sum - $a[$i] * ($N - $i - 1);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
