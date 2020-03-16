<?php
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