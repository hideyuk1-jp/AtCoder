<?php

list($x, $y) = ints();
$s = ['1' => 300000, '2' => 200000, '3' => 100000];
$b = 400000;
echo $x === 1 && $y === 1 ? $s[$x] + $s[$y] + $b : ($s[$x] ?? 0) + ($s[$y] ?? 0);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
