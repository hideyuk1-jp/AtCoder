<?php

list($a) = ints();
echo(intdiv($a, 2) * ($a - intdiv($a, 2))) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
