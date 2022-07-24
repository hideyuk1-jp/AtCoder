<?php

list($n) = ints();
echo $n % 2 ? $n + 1 : $n - 1;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
