<?php
// 2019-08-14 09:16 開始 ABCをAC 2019-08-14 09:27

fscanf(STDIN, '%d %d', $n, $m);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$x = array_count_values($a);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $b, $c);
    $x[$c] = ($x[$c] ?? 0) + $b;
}
krsort($x);
$ans = 0;
foreach ($x as $k => $v) {
    $min = min($v, $n);
    $ans += $k * $min;
    $n -= $min;
    if ($n === 0) break;
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $n, $m);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $l[], $r[]);
}

$left = $l[0];
$right = $r[0];
for($i = 1; $i < $m; $i++) {
    $left = max($left, $l[$i]);
    $right = min($right, $r[$i]);
}
$ans = max($right - $left + 1, 0);
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d %d', $r, $d, $x);
for ($i = 1; $i <= 10; $i++) {
    $x = $r * $x - $d;
    echo $x . PHP_EOL;
}

exit();

fscanf(STDIN, '%d %d', $a, $b);
if ($a >= 13) $ans = $b;
elseif ($a >= 6) $ans = $b / 2;
else $ans = 0;
echo $ans . PHP_EOL;