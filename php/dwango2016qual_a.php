<?php

list($n) = ints();
echo intdiv($n, 25) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
