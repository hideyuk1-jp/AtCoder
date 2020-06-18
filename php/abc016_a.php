<?php
list($m, $d) = ints();
echo $m % $d ? 'NO' : 'YES';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
