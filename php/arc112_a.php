<?php

[$N] = ints();
for ($i = 0; $i < $N; ++$i) {
    [$l, $r] = ints();
    if ($r - $l < $l) {
        $ans[] = 0;
        continue;
    }
    $max = $r - $l + 1 - $l;
    $ans[] = (1 + $max) * $max / 2;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
