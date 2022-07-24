<?php

list($n) = ints();
$h = intdiv($n, 3600);
$m = intdiv($n % 3600, 60);
$s = $n % 60;
echo str_pad($h, 2, '0', STR_PAD_LEFT) . ':' . str_pad($m, 2, '0', STR_PAD_LEFT) . ':' . str_pad($s, 2, '0', STR_PAD_LEFT) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
