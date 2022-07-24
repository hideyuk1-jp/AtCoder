<?php

$a = ints();
echo max($a) === array_sum($a) - max($a) ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
