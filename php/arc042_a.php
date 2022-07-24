<?php

list($n, $m) = ints();
for ($i = 1; $i <= $n; ++$i) {
    $t[$i] = -$i;
}
for ($i = 0; $i < $m; ++$i) {
    list($a) = ints();
    $t[$a] = $i;
}
arsort($t);
echo implode(PHP_EOL, array_keys($t)) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
