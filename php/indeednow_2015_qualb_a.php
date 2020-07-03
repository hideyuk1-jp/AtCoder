<?php
list($x1, $y1) = ints();
list($x2, $y2) = ints();
echo abs($x1 - $x2) + abs($y1 - $y2) + 1;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
