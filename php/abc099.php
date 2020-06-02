<?php
// C
fscanf(STDIN, '%d', $n);
if ($n < 6) exit(strval($n));
for ($i = 1; $i <= floorFloat(log($n, 6)); $i++) $a6[] = 6 ** $i;
for ($i = 1; $i <= floorFloat(log($n, 9)); $i++) $a9[] = 9 ** $i;
rsort($a6);
rsort($a9);
$ans = PHP_INT_MAX;
for ($i = 0; $i <= $n; $i++) {
    $cnt = 0;
    $t = $i;
    foreach ($a6 as $v) {
        $cnt += intdiv($t, $v);
        $t %= $v;
    }
    $cnt += $t;
    $t = $n - $i;
    foreach ($a9 as $v) {
        $cnt += intdiv($t, $v);
        $t %= $v;
    }
    $cnt += $t;
    $ans = min($ans, $cnt);
}
echo $ans;

function floorFloat($n)
{
    $x = explode('.', strval($n));
    return intval($x[0]);
}

function ceilFloat($n)
{
    $x = explode('.', strval($n));
    return isset($x[1]) && intval($x[1]) > 0 ? intval($x[0]) + 1 : intval($x[0]);
}

exit;

// B
fscanf(STDIN, '%d %d', $a, $b);
$sum = 0;
for ($i = 1; $i < $b - $a; $i++) {
    $sum += $i;
}
echo $sum - $a;

exit;

// A
fscanf(STDIN, '%d', $n);
echo $n >= 1000 ? 'ABD' : 'ABC';
