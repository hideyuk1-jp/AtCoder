<?php
// 二分探索：oooooooxxxxxxx となるような一番右のoを見つける場合など
fscanf(STDIN, '%d %d', $r, $b);
fscanf(STDIN, '%d %d', $x, $y);

$ok = 0;
$ng = intdiv($r + $b, 3) + 1;
while (abs($ok - $ng) > 1) {
    $mid = intdiv($ok + $ng, 2);
    if ($mid <= ($r - $mid) / ($x - 1) + ($b - $mid) / ($y - 1)) $ok = $mid;
    else $ng = $mid;
}
echo $ok;
