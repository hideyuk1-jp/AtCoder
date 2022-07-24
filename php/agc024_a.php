<?php

list($a, $b, $c, $k) = ints();
echo $k % 2 ? $b - $a : $a - $b;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
