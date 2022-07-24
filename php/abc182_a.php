<?php

[$A, $B] = ints();
echo(2 * $A + 100 - $B) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
