<?php
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
while (true) {
    $n = count($a);
    if ($n === 1) break;
    sort($a);
    $a_tmp = [$a[0]];
    for ($i = 1; $i < $n; $i++) {
        $x = $a[$i] % $a[0];
        if ($x > 0) $a_tmp[] = $x;
    }
    $a = $a_tmp;
}
echo $a[0];

exit;

fscanf(STDIN, '%d %d', $n, $m);
for ($i  = 0; $i < $n; $i++) $a[] = array_map('intval', explode(' ', trim(fgets(STDIN))));
$f = array_fill(1, $m, true);
for ($i = 0; $i < $n; $i++) {
    $k[$i] = $a[$i][0];
    $a[$i] = array_slice($a[$i], 1);
    for ($j = 1; $j <= $m; $j++) {
        if (!in_array($j, $a[$i])) $f[$j] = false;
    }
}
$cnt = 0;
for ($i = 1; $i <= $m; $i++) {
    if ($f[$i]) $cnt++;
}
echo $cnt . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $a, $b);
if ($b % $a === 0) $ans = $a + $b;
else $ans = $b - $a;
echo $ans . PHP_EOL;
