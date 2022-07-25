<?php

[$n] = ints();
$a = ints();
$b = ints();
echo max(min($b) - max($a) + 1, 0);

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
