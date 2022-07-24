<?php

[$n] = ints();
[$x0, $y0] = ints();
[$xx, $yx] = ints();
$r = sqrt(($xx - $x0) ** 2 + ($yx - $y0) ** 2) / 2;
$s0 = deg2rad((180 * $n - 360) / $n / 2);
$r *= cos($s0) * 2;
$s = atan2($yx - $y0, $xx - $x0) - $s0;
$x = $x0 + $r * cos($s);
$y = $y0 + $r * sin($s);
echo $x . ' ' . $y;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
