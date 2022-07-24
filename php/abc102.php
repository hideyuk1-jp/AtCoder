<?php

// C
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
for ($i = 0; $i < $n; $i++) {
    $aa[] = $a[$i] - ($i + 1);
}
sort($aa);
$b = $aa[intdiv($n, 2)];
$ans = 0;
for ($i = 0; $i < $n; $i++) {
    $ans += abs($a[$i] - ($i + 1) - $b);
}
echo $ans;

exit;

// B
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
echo max($a) - min($a);

exit;

// A
fscanf(STDIN, '%d', $n);
echo $n % 2 ? $n * 2 : $n;
