<?php

$a = ints();
sort($a);
echo $a[0] + $a[2] === $a[1] * 2 ? 'Yes' : 'No';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
