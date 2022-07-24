<?php

list($n) = ints();
echo  intdiv($n, 2) + $n % 2 - 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
