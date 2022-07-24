<?php

list($n, $m) = ints();
$t = 100 * ($n - $m) + 1900 * $m;
echo(2 ** $m) * $t;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
