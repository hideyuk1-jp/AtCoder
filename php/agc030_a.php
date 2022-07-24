<?php

list($a, $b, $c) = ints();
echo min($c, $a + $b + 1) + $b;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
