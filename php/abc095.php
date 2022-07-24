<?php

// C
fscanf(STDIN, '%d %d %d %d %d', $a, $b, $c, $x, $y);
$ans = 0;
// A B 1枚ずつ用意
$num = min($x, $y);
$cost = min($a + $b, $c * 2);
$ans += $cost * $num;
// 残りのピザを用意
$num = abs($x - $y);
$cost = $x > $y ? min($a, $c * 2) : min($b, $c * 2);
$ans += $cost * $num;
echo $ans;

exit;

// B
fscanf(STDIN, '%d %d', $n, $x);
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d', $m[]);
}
echo $n + intdiv(($x - array_sum($m)), min($m));

exit;

// A
fscanf(STDIN, '%s', $s);
echo 700 + 100 * substr_count($s, 'o');
