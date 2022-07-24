<?php

list($n) = ints();
$sum = 0;
for ($i = 0; $i < $n; ++$i) {
    list($s, $t) = strs();
    $sum += (int) $t;
    $past[$s] = $sum;
}
list($x) = strs();
echo $sum - $past[$x];
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
