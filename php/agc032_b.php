<?php

list($n) = ints();
for ($i = 1; $i <= intdiv($n, 2); ++$i) {
    if ($n % 2) {
        $g[$i][$n - $i] = false;
    } else {
        $g[$i][$n - $i + 1] = false;
    }
}
echo(intdiv($n * ($n - 1), 2) - intdiv($n, 2)) . PHP_EOL;
for ($i = 1; $i <= $n - 1; ++$i) {
    for ($j = $i + 1; $j <= $n; ++$j) {
        if (!isset($g[$i][$j])) {
            echo $i . ' ' . $j . PHP_EOL;
        }
    }
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
