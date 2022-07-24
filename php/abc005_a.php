<?php

list($x, $y) = ints();
echo intdiv($y, $x) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
