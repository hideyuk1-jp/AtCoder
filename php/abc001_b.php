<?php

list($m) = ints();
if ($m < 100) {
    echo '00';
} elseif ($m <= 5000) {
    $m /= 100;
    echo str_pad((string) $m, 2, '0', STR_PAD_LEFT);
} elseif ($m <= 30000) {
    $m = $m / 1000 + 50;
    echo $m;
} elseif ($m <= 70000) {
    $m = ($m / 1000 - 30) / 5 + 80;
    echo $m;
} else {
    echo '89';
}
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
