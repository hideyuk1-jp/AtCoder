<?php

list($s) = strs();
list($t) = strs();
$min = PHP_INT_MAX;
for ($i = 0; $i < strlen($s) - strlen($t) + 1; ++$i) {
    $cnt = 0;
    for ($j = 0; $j < strlen($t); ++$j) {
        if ($s[$i + $j] !== $t[$j]) {
            ++$cnt;
        }
    }
    $min = min($min, $cnt);
}
echo $min;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
