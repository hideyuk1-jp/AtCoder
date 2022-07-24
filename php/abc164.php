<?php

// D
fscanf(STDIN, '%s', $s);
$n = strlen($s);
$mods = array_fill(0, 2019, 0);
$mods[0]++;
$mod = 0;
$t = 1;
for ($i = $n - 1; $i >= 0; $i--) {
    $mod = ($mod + (int) $s[$i] * $t) % 2019;
    $t = $t * 10 % 2019;
    $mods[$mod]++;
}
$ans = 0;
for ($i = 0; $i < 2019; $i++) {
    $ans += intdiv($mods[$i] * ($mods[$i] - 1), 2);
}
echo $ans;

exit;

// C
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%s', $s[]);
}
echo count(array_unique($s));

exit;

// B
fscanf(STDIN, '%d %d %d %d', $a, $b, $c, $d);
$ans = (int) ceil($a / $d) >= (int) ceil($c / $b) ? 'Yes' : 'No';
echo $ans;

exit;

// A
fscanf(STDIN, '%d %d', $s, $w);
$ans = $w >= $s ? 'unsafe' : 'safe';
echo $ans;
