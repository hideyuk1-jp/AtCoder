<?php
list($x, $y) = ints();
echo $x % $y ? $x : -1;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
