<?php
list($n) = strs();
$n = strrev($n);
$sumd = [0, 0];
for ($i = 0; $i < strlen($n); ++$i) {
    if ($i % 2) $sumd[0] += (int) $n[$i];
    else $sumd[1] += (int) $n[$i];
}
echo implode(' ', $sumd) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
