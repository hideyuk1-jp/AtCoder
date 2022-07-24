<?php

list($x1, $y1, $r) = ints();
list($x2, $y2, $x3, $y3) = ints();
if (isRedInBlue()) {
    exit(implode(PHP_EOL, ['NO', 'YES']));
} elseif (isBlueInRed()) {
    exit(implode(PHP_EOL, ['YES', 'NO']));
}
echo implode(PHP_EOL, ['YES', 'YES']);
function isRedInBlue()
{
    global $x1, $y1, $r, $x2, $y2, $x3, $y3;
    return $x1 - $r >= $x2
        && $x1 + $r <= $x3
        && $y1 - $r >= $y2
        && $y1 + $r <= $y3;
}
function isBlueInRed()
{
    global $x1, $y1, $r, $x2, $y2, $x3, $y3;
    return calcDist($x1, $y1, $x2, $y2) <= $r
        && calcDist($x1, $y1, $x2, $y3) <= $r
        && calcDist($x1, $y1, $x3, $y2) <= $r
        && calcDist($x1, $y1, $x3, $y3) <= $r;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
// 2頂点間の距離
function calcDist($x1, $y1, $x2, $y2)
{
    return sqrt(($x1 - $x2) ** 2 + ($y1 - $y2) ** 2);
}
