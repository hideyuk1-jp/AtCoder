<?php
list($c) = ints();
$n = 3;
$max = array_fill(0, $n, PHP_INT_MIN);
for ($i = 0; $i < $c; ++$i) {
    $a = ints();
    sort($a);
    for ($k = 0; $k < $n; ++$k) $max[$k] = max($max[$k], $a[$k]);
}
echo array_product($max) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
