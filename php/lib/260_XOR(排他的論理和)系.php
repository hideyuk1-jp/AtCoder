<?php
// 排他的論理和の重要な性質
$a = 3312;

// 0との排他的論理和は同じ数字になる
echo $a ^ 0;
echo PHP_EOL;

// 同じ数字との排他的論理和は0になる
echo $a ^ $a;
echo PHP_EOL;

// aと、b0~bn-1の中のいくつかの数とxorを計算していき0とすることは可能か
// つまり、b0~bn-1の中のいくつかの数のxorがaとなるかどうか
$b = [1, 2, 5];

// まずbの基底を計算
$base[0] = $b[0];
for ($i = 1; $i < count($b); ++$i) {
    $x = $b[$i];
    foreach ($base as $bb) $x = min($x, $x ^ $bb);
    if ($x) {
        $base[] = $x;
        rsort($base);
    }
}
var_dump($base);
var_dump(solve(6, $base));
var_dump(solve(7, $base));
var_dump(solve(8, $base));
var_dump(solve(9, $base));
// xを基底baseで表現可能か、可能な場合0を返し、不可能な場合は必要な基底を返す
function solve($x, $base)
{
    foreach ($base as $b) $x = min($x, $x ^ $b);
    return $x;
}
