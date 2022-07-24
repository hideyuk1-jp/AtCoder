<?php

// 二分探索
list($a, $b, $c) = ints();
$digit = 10 ** 12;
$r = 200 * $digit;
$l = 0 * $digit;
while (abs($r - $l) > 1) {
    $mid = intdiv($r + $l, 2);
    if ($a * $mid / $digit + $b * sin($c * $mid / $digit * pi()) >= 100) {
        $r = $mid;
    } else {
        $l = $mid;
    }
}
echo($r / $digit);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
