<?php

list($x, $y) = ints();
foreach ([1, 3, 5, 7, 8, 10, 12] as $v) {
    $g[$v] = 0;
}
foreach ([4, 6, 9, 11] as $v) {
    $g[$v] = 1;
}
foreach ([2] as $v) {
    $g[$v] = 2;
}
echo $g[$x] === $g[$y] ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
