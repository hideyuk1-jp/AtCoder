<?php

list($n) = ints();
$a = ints();
echo max($a) - min($a);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
