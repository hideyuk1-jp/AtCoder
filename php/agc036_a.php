<?php

list($s) = ints();
// (0,0),(10**9,1),(x2,y2) とすると面積sは s=abs(10**9*y2-x2)
$y2 = intdiv($s, 10 ** 9) + min(1, $s % (10 ** 9));
$x2 = 10 ** 9 * $y2 - $s;
echo implode(' ', [0, 0, 10 ** 9, 1, $x2, $y2]);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
