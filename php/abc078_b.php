<?php
list($x, $y, $z) = ints();
echo intdiv($x - ($y + 2 * $z), $y + $z) + 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
