<?php

[$a, $b, $c] = ints();
echo $a**2 + $b**2 < $c**2 ? 'Yes' : 'No';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
