<?php

list($n) = ints();
list($k) = ints();
$x = 1;
for ($i = 0; $i < $n; ++$i) {
    if ($x > $k) {
        $x += $k;
    } else {
        $x *= 2;
    }
}
echo $x;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
