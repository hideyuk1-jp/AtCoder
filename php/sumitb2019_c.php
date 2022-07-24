<?php

list($x) = ints();
echo $x % 100 <= 5 * intdiv($x, 100) ? 1 : 0;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
