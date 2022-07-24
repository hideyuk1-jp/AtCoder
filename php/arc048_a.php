<?php

list($a, $b) = ints();
echo $a < 0 && $b > 0 ? $b - $a - 1 : $b - $a;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
