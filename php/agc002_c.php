<?php

list($n, $l) = ints();
$a = ints();
for ($i = 0; $i < $n - 1; ++$i) {
    if ($a[$i] + $a[$i + 1] < $l) {
        continue;
    }

    echo 'Possible', PHP_EOL;
    for ($j = 1; $j <= $i; ++$j) {
        echo $j, PHP_EOL;
    }
    for ($j = $n - 1; $j > $i; --$j) {
        echo $j, PHP_EOL;
    }
    exit;
}
echo 'Impossible', PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
