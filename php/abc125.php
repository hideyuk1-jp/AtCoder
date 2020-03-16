<?php
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$abs_sum = 0;
$abs_min = abs($a[0]);
$minus_cnt = 0;
for ($i = 0; $i < $n; $i++) {
    $abs = abs($a[$i]);
    $abs_sum += $abs;
    $abs_min = min($abs_min, $abs);
    if ($a[$i] < 0) $minus_cnt++;
}
if ($minus_cnt % 2 === 1) $ans = $abs_sum - $abs_min * 2;
else $ans = $abs_sum;
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$v = array_map('intval', explode(' ', trim(fgets(STDIN))));
$c = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 0;
for ($i = 0; $i < $n; $i++) {
    $val = $v[$i] - $c[$i];
    if ($val > 0) $ans += $val;
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d %d', $a, $b, $t);
$ans = floor(($t + 0.5) / $a) * $b;
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));

$gcd[0] = $a[0];
for ($i = 1; $i < $n; $i++) {
    $gcd[$i] = gcd($gcd[$i - 1], $a[$i]);
}
$gcd_rev[$n - 1] = $a[$n - 1];
for ($i = $n - 2; $i >= 0; $i--) {
    $gcd_rev[$i] = gcd($gcd_rev[$i + 1], $a[$i]);
}
$max = 0;
for ($i = 0; $i < $n; $i++) {
    $val = gcd($gcd[$i - 1] ?? $gcd_rev[$i + 1], $gcd_rev[$i + 1] ?? $gcd[$i - 1]);
    $max = max($max, $val);
}
echo $max . PHP_EOL;

// 最大公約数
function gcd($m, $n){
    if($n > $m) list($m, $n) = [$n, $m];

    if ($m % $n === 0) return $n;
    else return gcd($n, $m % $n);
}