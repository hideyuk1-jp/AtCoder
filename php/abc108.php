<?php

// C
fscanf(STDIN, '%d %d', $n, $k);
$ans = intdiv($n, $k) ** 3;
if ($k % 2 === 0) {
    $ans += intdiv($n + $k / 2, $k) ** 3;
}
echo $ans;

exit;

// B
fscanf(STDIN, '%d %d %d %d', $x1, $y1, $x2, $y2);
$xx = $x2 - $x1;
$yy = $y2 - $y1;
echo implode(' ', [$x2 - $yy, $y2 + $xx, $x1 - $yy, $y1 + $xx]);

exit;

// A
fscanf(STDIN, '%d', $k);
echo((int) floor($k / 2) * (int) ceil($k / 2));
