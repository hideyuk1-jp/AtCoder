<?php

list($k, $s) = ints();
$cnt = 0;
for ($x = 0; $x <= $k; ++$x) {
    for ($y = 0; $y <= min($s - $x, $k); ++$y) {
        $z = $s - $x - $y;
        if ($z >= 0 && $z <= $k) {
            $cnt++;
        }
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
