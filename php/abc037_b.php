<?php

list($n, $q) = ints();
$a = array_fill(0, $n, 0);
for ($i = 0; $i < $q; ++$i) {
    list($l, $r, $t) = ints();
    --$l;
    --$r;
    for ($j = $l; $j <= $r; ++$j) {
        $a[$j] = $t;
    }
}
echo implode(PHP_EOL, $a);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
