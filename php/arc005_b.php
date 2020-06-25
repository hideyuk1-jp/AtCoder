<?php
list($x, $y, $w) = strs();
--$x;
--$y;
for ($i = 0; $i < 9; ++$i) list($c[]) = strs();
$dx = $dy = 0;
if ($w[0] === 'R') $dx = 1;
elseif ($w[0] === 'L') $dx = -1;
elseif ($w[0] === 'U') $dy = -1;
elseif ($w[0] === 'D') $dy = 1;
if (strlen($w) > 1) {
    if ($w[1] === 'U') $dy = -1;
    elseif ($w[1] === 'D') $dy = 1;
}
$ans = '';
for ($i = 0; $i < 4; ++$i) {
    $yy = $y + $i * $dy;
    if ($yy < 0) $yy = abs($yy);
    if ($yy > 8) $yy = 8 - ($yy - 8);
    $xx = $x + $i * $dx;
    if ($xx < 0) $xx = abs($xx);
    if ($xx > 8) $xx = 8 - ($xx - 8);
    $ans .= $c[$yy][$xx];
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
