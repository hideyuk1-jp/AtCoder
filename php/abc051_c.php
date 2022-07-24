<?php

list($sx, $sy, $tx, $ty) = ints();
echo str_repeat('R', $tx - $sx) .
    str_repeat('U', $ty - $sy) .
    str_repeat('L', $tx - $sx) .
    str_repeat('D', $ty - $sy) .
    'D' . str_repeat('R', $tx - $sx + 1) .
    str_repeat('U', $ty - $sy + 1) . 'L' .
    'U' . str_repeat('L', $tx - $sx + 1) .
    str_repeat('D', $ty - $sy + 1) . 'R';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
