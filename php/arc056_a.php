<?php
list($a, $b, $k, $l) = ints();
echo intdiv($k, $l) * $b + min($k % $l * $a, $b);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
