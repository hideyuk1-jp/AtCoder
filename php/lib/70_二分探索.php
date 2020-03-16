<?php
// 二分探索：oooooooxxxxxxx となるような一番右のoを見つける場合など
fscanf(STDIN, '%d %d', $r, $b);
fscanf(STDIN, '%d %d', $x, $y);

$left = 0;
$right = floor(($r + $b) / 3) + 1;

while ($right - $left > 1) {
    $mid = floor(($left + $right) / 2);
    if ($mid <= ($r - $mid) / ($x - 1) + ($b - $mid) / ($y - 1)) $left = $mid;
    else $right = $mid;
}

echo $left.PHP_EOL;