<?php

list($n) = ints();
$k = ints();
for ($i = 0; $i < $n; ++$i) {
    $l[$i] = min($k[$i - 1] ?? PHP_INT_MAX, $k[$i] ?? PHP_INT_MAX);
}
echo implode(' ', $l);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
