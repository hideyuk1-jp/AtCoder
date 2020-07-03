<?php
list($n, $k) = ints();
echo intdiv($n, 2) + $n % 2 >= $k ? 'YES' : 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
