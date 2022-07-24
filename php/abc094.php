<?php

// D
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$l = max($a);
unset($a[array_search($l, $a)]);
$d = PHP_INT_MAX;
foreach ($a as $v) {
    $td = abs($l / 2 - $v);
    if ($td < $d) {
        $d = $td;
        $r = $v;
    }
}
echo implode(' ', [$l, $r]);

exit;

// C
fscanf(STDIN, '%d', $n);
$x = array_map('intval', explode(' ', trim(fgets(STDIN))));
$_x = $x;
asort($x);
sort($_x);
$cnt = 0;
foreach ($x as $i => $v) {
    $ans[$i] = intdiv($n, 2) > $cnt ? $_x[intdiv($n, 2)] : $_x[intdiv($n, 2) - 1];
    $cnt++;
}
ksort($ans);
echo implode(PHP_EOL, $ans);

exit;

// B
fscanf(STDIN, '%d %d %d', $n, $m, $x);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$c0 = $cn = 0;
for ($i = 0; $i < $m; $i++) {
    if ($a[$i] < $x) {
        $c0++;
    } else {
        $cn++;
    }
}
echo min($c0, $cn);

exit;

// A
fscanf(STDIN, '%d %d %d', $a, $b, $x);
echo $x >= $a && $x <= $a + $b ? 'YES' : 'NO';
