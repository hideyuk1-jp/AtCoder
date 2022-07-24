<?php

list($a, $b, $k) = ints();
for ($i = 0; $i < $k; ++$i) {
    if ($i % 2) {
        $b = intdiv($b, 2);
        $a += $b;
    } else {
        $a = intdiv($a, 2);
        $b += $a;
    }
}
echo implode(' ', [$a, $b]);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
