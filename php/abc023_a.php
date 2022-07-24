<?php

list($x) = ints();
echo(intdiv($x, 10) + $x % 10) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
