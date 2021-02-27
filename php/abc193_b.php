<?php
[$N] = ints();
$min = 10 ** 9 + 1;
for ($i = 0; $i < $N; ++$i) {
    [$a, $p, $x] = ints();
    if ($x - $a > 0) $min = min($min, $p);
}
echo $min !== 10 ** 9 + 1 ? $min : -1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
