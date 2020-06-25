<?php
list($y) = ints();
echo ($y % 4 === 0 && $y % 100) || $y % 400 === 0 ? 'YES' : 'NO';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
