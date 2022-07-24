<?php

list($n) = ints();
echo(2 * $n) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
