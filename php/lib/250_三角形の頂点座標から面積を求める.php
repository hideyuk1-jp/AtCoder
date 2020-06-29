<?php
// 三角形の頂点座標から面積を求める
$n0 = [1, 5];
$n1 = [4, 12];
$n2 = [33, 2];

// 並行移動して1つの頂点を(0, 0)にする
$x1 = $n1[0] - $n0[0];
$y1 = $n1[1] - $n0[1];
$x2 = $n2[0] - $n0[0];
$y2 = $n2[1] - $n0[1];

echo calcAreaOfTri($x1, $y1, $x2, $y2);

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
