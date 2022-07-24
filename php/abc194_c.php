<?php

[$N] = ints();
$a = ints();
// 4 64 16 -2*16-2*32-2*8
// 84*2 -32 -64 -16
$ans = 0;
$csum[0] = 0;
$sum = 0;
for ($i = 0; $i < $N; ++$i) {
    $ans += ($N - 1) * ($a[$i] ** 2);
    $sum += $a[$i];
    $csum[$i + 1] = $csum[$i] + $a[$i];
}
for ($i = 0; $i < $N; ++$i) {
    $ans -= $a[$i] * ($sum - $a[$i]);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
