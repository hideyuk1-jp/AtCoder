<?php
const MOD = 10 ** 9 + 7;
list($T) = ints();
for ($i = 0; $i < $T; ++$i) {
    list($n, $a, $b) = ints();
    if ($a < $b) list($a, $b) = [$b, $a];
    // それぞれの置き方
    $ans = (($a - 1) ** 2) * (($b - 1) ** 2);
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
