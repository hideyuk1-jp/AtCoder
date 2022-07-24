<?php

list($w, $h, $n) = ints();
$x0 = $y0 = 0;
$x1 = $w;
$y1 = $h;
for ($i = 0; $i < $n; ++$i) {
    list($x, $y, $a) = ints();
    if ($a === 1) {
        $x0 = max($x0, $x);
    }
    if ($a === 2) {
        $x1 = min($x1, $x);
    }
    if ($a === 3) {
        $y0 = max($y0, $y);
    }
    if ($a === 4) {
        $y1 = min($y1, $y);
    }
}
echo max(0, $x1 - $x0) * max(0, $y1 - $y0);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
