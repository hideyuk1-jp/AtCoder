<?php

[$N] = ints();
$x = (-1 + 2 * sqrt(1 / 4 + 2 * ($N + 1))) / 2;
$x = (int)floor($x) - 1;
while ($N + 1 >= ($x + 1) * ($x + 2) / 2) {
    ++$x;
}
echo $N - $x + 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
