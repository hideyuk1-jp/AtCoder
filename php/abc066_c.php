<?php

list($n) = ints();
$a = ints();
$r = $l = [];
for ($i = 0; $i < $n; ++$i) {
    if ($i % 2 === 0) {
        $r[] = $a[$i];
    } else {
        $l[] = $a[$i];
    }
}
if ($n % 2) {
    list($l, $r) = [$r, $l];
}
krsort($l);
echo implode(' ', array_merge($l, $r));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
