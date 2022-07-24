<?php

fscanf(STDIN, '%d', $n);
$cnt = [];
for ($i = 0; $i < 10; $i++) {
    $cnt[] = array_fill(0, 10, 0);
}

for ($i = 1; $i <= $n; $i++) {
    $keta_last = $i % 10;
    $keta_first = intval(substr(strval($i), 0, 1));
    $cnt[$keta_last][$keta_first]++;
}
$ans = 0;
for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= 9; $j++) {
        $ans += ($cnt[$i][$j] ?? 0) * ($cnt[$j][$i] ?? 0);
    }
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d', $n);
$p = array_map('intval', explode(' ', trim(fgets(STDIN))));
$min = 10 ** 9 + 7;
$ans = 0;
for ($i = 0; $i < $n; $i++) {
    $min = min($p[$i], $min);
    if ($p[$i] === $min) {
        $ans++;
    }
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $a, $b);
$ab = str_repeat(strval($a), $b);
$ba = str_repeat(strval($b), $a);
$ans = strcmp($ab, $ba) < 0 ? $ab : $ba;
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $n, $m);
$ans = $n === $m ? 'Yes' : 'No';
echo $ans . PHP_EOL;
