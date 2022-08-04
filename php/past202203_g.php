<?php

[$a, $b, $c] = ints();
$left = 1;
$right = 2;
while (abs($left - $right) > 10 ** -10) {
    $mid = ($left + $right) / 2;
    if (calc($mid) <= 0) {
        $left = $mid;
    } else {
        $right = $mid;
    }
}
echo $left;
function calc($x)
{
    global $a, $b, $c;
    return $a * ($x ** 5) + $b * $x + $c;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
