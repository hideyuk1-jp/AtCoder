<?php

list($a, $b, $c) = ints();
echo $c >= $a && $c <= $b ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
