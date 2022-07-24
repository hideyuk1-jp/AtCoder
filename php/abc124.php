<?php

fscanf(STDIN, '%d %d', $n, $k);
fscanf(STDIN, '%s', $s);
$pos = $s[0];
$i = 0;
$j = 0;
$sum[0] = 0;
while ($i < $n) {
    if ($pos === '0') {
        $j++;
    }
    $n_pos = ($pos === '1') ? '0' : '1';
    $n_i = strpos($s, $n_pos, $i);
    if (!$n_i) {
        $n_i = $n;
    }
    $r[] = [
        'val' => $pos,
        'cnt' => $n_i - $i
    ];
    $m = count($sum);
    $sum[] = $sum[$m - 1] + $n_i - $i;
    $pos = $n_pos;
    $i = $n_i;
}
if ($j <= $k) {
    echo $n . PHP_EOL;
    exit();
}
$max = 0;
if ($s[0] === '0') {
    for ($i = 0; $i < 2 * ($j - $k + 1); $i += 2) {
        $val = $sum[$i + 2 * ($k - 1) + 1] - $sum[$i] + ($r[$i + 2 * ($k - 1) + 1]['cnt'] ?? 0) + ($r[$i - 1]['cnt'] ?? 0);
        $max = max($max, $val);
    }
} else {
    for ($i = 1; $i < 2 * ($j - $k + 1) + 1; $i += 2) {
        $val = $sum[$i + 2 * ($k - 1) + 1] - $sum[$i] + ($r[$i + 2 * ($k - 1) + 1]['cnt'] ?? 0) + ($r[$i - 1]['cnt'] ?? 0);
        $max = max($max, $val);
    }
}
$ans = $max;
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%s', $s);
$n = strlen($s);
$r0[0] = $r0[1] = $r1[0] = $r1[1] = 0;
for ($i = 0; $i < $n; $i++) {
    $j = (int)$s[$i];
    if ($i % 2 === 0) {
        $r0[$j]++;
    } else {
        $r1[$j]++;
    }
}
$ans = min($r0[1] + $r1[0], $r0[0] + $r1[1]);
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$h = array_map('intval', explode(' ', trim(fgets(STDIN))));

$max = $h[0];
$ans = 0;
for ($i = 0; $i < $n; $i++) {
    if ($h[$i] >= $max) {
        $ans++;
    }
    $max = max($max, $h[$i]);
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $a, $b);

if ($a === $b) {
    $ans = 2 * $a;
} else {
    $ans = max($a, $b);
    $ans = $ans + $ans - 1;
}
echo $ans . PHP_EOL;
