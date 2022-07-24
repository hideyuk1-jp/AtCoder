<?php

list($n, $m) = ints();
if ($m < $n * 2 || $m > $n * 4) {
    exit('-1 -1 -1' . PHP_EOL);
}
$x = $n * 2;
if ($m - $x <= $n) {
    echo implode(' ', [$n - ($m - $x), $m - $x, 0]);
} else {
    echo implode(' ', [0, $n - (($m - $x) - $n), ($m - $x) - $n]);
}
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
