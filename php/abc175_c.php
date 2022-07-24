<?php

list($x, $k, $d) = ints();
$t = intdiv(abs($x), $d);
if ($k <= $t) {
    echo abs($x) - $k * $d;
    exit();
}
echo($k - $t) % 2 ? $d - abs($x) % $d : abs($x) % $d;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
