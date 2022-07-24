<?php

list($n) = ints();
$a = ints();
// 尺取法
$ans = 0;
$r = 0;
$x = 0;
for ($l = 0; $l < $n; ++$l) {
    $r = max($r, $l);
    while ($r < $n && ($x ^ $a[$r]) === ($x + $a[$r])) {
        $x += $a[$r];
        ++$r;
    }
    $ans += $r - $l;
    $x -= $a[$l];
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
