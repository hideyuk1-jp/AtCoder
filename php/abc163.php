<?php
// D
define("MOD", 10 ** 9 + 7);
fscanf(STDIN, '%d %d', $n, $k);
$ans = 0;
for ($i = $k; $i <= $n + 1; $i++) {
    $min = ($i - 1) * $i / 2;
    $max = (2 * $n - $i + 1) * $i / 2;
    $ans = ($ans + ($max - $min + 1)) % MOD;
}
echo $ans;

exit;

// C
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$buka = array_fill(0, $n, 0);
for ($i = 0; $i < $n - 1; $i++) {
    $buka[$a[$i] - 1]++;
}
echo implode(PHP_EOL, $buka);

exit;

// B
fscanf(STDIN, '%d %d', $n, $m);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = max($n - array_sum($a), -1);
echo $ans;

exit;

// A
fscanf(STDIN, '%d', $r);
$pi2 = 6.28318530717958623200;
$ans = $pi2 * $r;
echo $ans;
