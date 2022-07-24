<?php

list($n) = ints();
--$n;
echo intdiv($n, 20) % 2 ? 20 - $n % 20 : $n % 20 + 1;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
