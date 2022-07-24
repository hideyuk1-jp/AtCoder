<?php

list($n) = ints();
$dp = array_fill(0, $n + 1, 0);
for ($i = 0; $i < $n; ++$i) {
    list($p) = ints();
    $dp[$p] = $dp[$p - 1] + 1;
}
echo $n - max($dp);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
