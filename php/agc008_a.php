<?php

list($x, $y) = ints();
if (abs($x) === abs($y)) {
    exit('1');
}
$c = 0;
if ($x > 0 && abs($x) > abs($y)) {
    $c = 1;
    $x = -$x;
} elseif ($x < 0 && abs($x) < abs($y)) {
    $c = 1;
    $x = -$x;
}
$c += abs(abs($x) - abs($y));
$x += abs(abs($x) - abs($y));
if ($x !== $y) {
    ++$c;
}
echo $c;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
