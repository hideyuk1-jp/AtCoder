<?php

[$a, $b, $x, $y] = ints();
if ($a > $b) {
    echo $x + (abs($b - $a) - 1) * min($y, 2 * $x);
} else {
    echo $x + abs($b - $a) * min($y, 2 * $x);
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
