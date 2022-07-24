<?php

list($X, $Y) = ints();
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($x[$i], $y[$i]) = ints();
    // スタート地点が(0,0)になるように平行移動
    $x[$i] -= $X;
    $y[$i] -= $Y;
}
$min = INF;
for ($i = 0; $i < $n; ++$i) {
    $s = calcAreaOfTri($x[$i], $y[$i], $x[$i + 1] ?? $x[0], $y[$i + 1] ?? $y[0]);
    $l = calcDist($x[$i], $y[$i], $x[$i + 1] ?? $x[0], $y[$i + 1] ?? $y[0]);
    $d = $s / $l * 2;
    $min = min($min, $d);
}
echo $min . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
// (0, 0), (x1, y1), (x2, y2)の３頂点からなる三角形の面積を求める
function calcAreaOfTri($x1, $y1, $x2, $y2)
{
    return abs($x1 * $y2 - $x2 * $y1) / 2;
}
// 2頂点間の距離
function calcDist($x1, $y1, $x2, $y2)
{
    return sqrt(($x1 - $x2) ** 2 + ($y1 - $y2) ** 2);
}
