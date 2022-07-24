<?php

list($x, $y) = ints();
echo ($y >= 2 * $x && $y <= 4 * $x && $y % 2 === 0) ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
