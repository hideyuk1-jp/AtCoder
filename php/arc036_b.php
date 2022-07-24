<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($h[]) = ints();
}
$cntl[0] = $cntr[$n - 1] = 1;
for ($i = 1; $i < $n; ++$i) {
    $cntl[$i] = $h[$i] > $h[$i - 1] ? $cntl[$i - 1] + 1 : 1;
    $cntr[$n - 1 - $i] = $h[$n - 1 - $i] > $h[$n - $i] ? $cntr[$n - $i] + 1 : 1;
}
$max = 0;
for ($i = 0; $i < $n; ++$i) {
    $max = max($max, $cntl[$i] + $cntr[$i] - 1);
}
echo $max . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
