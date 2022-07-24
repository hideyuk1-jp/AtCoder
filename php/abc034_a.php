<?php

list($x, $y) = ints();
echo $x < $y ? 'Better' : 'Worse';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
