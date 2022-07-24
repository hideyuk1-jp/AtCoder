<?php

list($a, $k) = ints();
$n = 2 * (10 ** 12);
if ($k === 0) {
    exit((string) ($n - $a)) . PHP_EOL;
}
$i = 0;
while ($a < $n) {
    $a += 1 + $a * $k;
    $i++;
}
echo $i . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
