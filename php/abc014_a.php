<?php
list($a) = ints();
list($b) = ints();
echo $a % $b ? $b - $a % $b : 0;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
