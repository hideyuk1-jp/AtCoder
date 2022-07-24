<?php

list($n) = ints();
list($k) = ints();
echo $n >= $k * 2 ? 'YES' : 'NO';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
