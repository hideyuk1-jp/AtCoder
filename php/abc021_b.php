<?php

list($n) = ints();
list($a, $b) = ints();
list($k) = ints();
$p = ints();
$p = array_merge($p, [$a, $b]);
$up = array_unique($p);
echo $p === $up ? 'YES' : 'NO';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
