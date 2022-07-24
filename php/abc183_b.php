<?php

[$x1, $y1, $x2, $y2] = ints();
// -y1 = ax1 + b, y2 = ax2 + b
$a = ($y2 + $y1) / ($x2 - $x1);
$b = $y2 - $a * $x2;
echo -$b / $a;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
