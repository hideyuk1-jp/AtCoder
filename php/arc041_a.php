<?php
list($x, $y) = ints();
list($k) = ints();
echo min($y, $k) + $x - max(0, $k - $y) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
