<?php
fscanf(STDIN, '%d %d %d', $n, $a, $b);
define('MOD', 10 ** 9 + 7);

function cmb($n, $r)
{
    global $g1, $g2;
    if ($r < 0 || $r > $n) return 0;
    $r = min($r, $n - $r);
    return $g1[$n] * $g2[$r] * $g2[$n - $r] % MOD;
}

$g1 = [1, 1];
$g2 = [1, 1];
$inverse = [0, 1];

for ($i = 2; $i <= $n + 1; $i++) {
    $g1[] = $g1[count($g1) - 1] * $i % MOD;
    $inverse[] = (-$inverse[MOD % $i] * intval(MOD / $i)) % MOD;
    $g2[] = ($g2[count($g2) - 1] * $inverse[count($inverse) - 1]) % MOD;
}

$cnt = 0;
for ($i = 1; $i <= $n; $i++) {
    if ($i === $a || $i === $b) continue;
    $cnt += cmb($n, $i);
    $cnt %= MOD;
}
echo $cnt . PHP_EOL;

exit;

fscanf(STDIN, '%d', $n);
$x = array_map('intval', explode(' ', trim(fgets(STDIN))));

$x_max = 0;
for ($i = 0; $i < $n; $i++) {
    $x_max = max($x[$i], $x_max);
}
$hp_min = (100 ** 2) * 100;
for ($p = 1; $p <= $x_max; $p++) {
    $hp = 0;
    for ($i = 0; $i < $n; $i++) {
        $hp += ($x[$i] - $p) ** 2;
    }
    $hp_min = min($hp, $hp_min);
}
echo $hp_min . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $n, $k);
$ans = 1;
while (true) {
    if ($n / $k < 1) break;
    $ans++;
    $n = floor($n / $k);
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $n, $r);
$ans = ($n >= 10) ? $r : $r + 100 * (10 - $n);
echo $ans . PHP_EOL;
