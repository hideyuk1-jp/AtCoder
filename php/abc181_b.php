<?php

[$N] = ints();
$cnt = 0;
for ($i = 0; $i < $N; ++$i) {
    [$A, $B] = ints();
    $cnt += ($B - $A + 1) * ($A + $B) / 2;
}
echo $cnt . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
