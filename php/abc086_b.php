<?php

list($a, $b) = ints();
$n = intval(strval($a) . strval($b));
echo pow(intval(sqrt($n)), 2) === $n ? 'Yes' : 'No';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
