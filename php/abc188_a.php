<?php

[$x, $y] = ints();
echo abs($x - $y) < 3 ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
