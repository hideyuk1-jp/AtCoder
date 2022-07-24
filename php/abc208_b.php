<?php

[$p] = ints();
$k = [];
for ($i = 1; $i <= 10; ++$i) {
    $k[$i] = ($k[$i-1] ?? 1) * $i;
}
$cnt = 0;
for ($i = 10; $i >= 1; --$i) {
    $_cnt = min(intdiv($p, $k[$i]), 100);
    $cnt += $_cnt;
    $p -= $k[$i] * $_cnt;
    if ($i === 0) {
        break;
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
