<?php

list($n, $k) = ints();
$sum = 0;
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    $sum += $a;
    if (!isset($ans) && $sum >= $k) {
        $ans = $i + 1;
    }
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
