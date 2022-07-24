<?php

$n = ints();
sort($n);
echo $n === [1, 4, 7, 9] ? 'YES' : 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
