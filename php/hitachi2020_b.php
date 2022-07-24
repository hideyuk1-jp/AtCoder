<?php

list($A, $B, $M) = ints();
$a = ints();
$b = ints();
$min = min($a) + min($b);
for ($i = 0; $i < $M; ++$i) {
    list($x, $y, $c) = ints();
    --$x;
    --$y;
    $min = min($min, $a[$x] + $b[$y] - $c);
}
echo $min;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
