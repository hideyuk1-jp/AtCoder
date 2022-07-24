<?php

$a = ints();
echo array_sum($a) === 17 && max($a) === 7 && min($a) === 5 ? 'YES' : 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
