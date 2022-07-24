<?php

list($n, $a, $b) = ints();
echo($n - 1) % ($a + $b) < $a ? 'Ant' : 'Bug';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
