<?php

list($r, $g, $b, $n) = ints();
$cnt = 0;
for ($i = 0; $i <= intdiv($n, $r); ++$i) {
    for ($j = 0; $j <= intdiv($n - $r * $i, $g); ++$j) {
        if (($n - $r * $i - $j * $g) % $b === 0) {
            ++$cnt;
        }
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
