<?php
// C
fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);
$cusum['E'][0] = 0;
$cusum['W'][0] = 0;
for ($i = 1; $i <= $n; $i++) {
    $cusum['E'][$i] = $cusum['E'][$i - 1];
    $cusum['W'][$i] = $cusum['W'][$i - 1];
    $cusum[$s[$i - 1]][$i]++;
}
$ans = PHP_INT_MAX;
for ($i = 0; $i < $n; $i++)
    $ans = min($ans, $n - 1 - ($cusum['E'][$i] + ($cusum['W'][$n] - $cusum['W'][$i + 1])));
echo $ans;

exit;

// B
fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);
$ans = 0;
for ($i = 1; $i < $n; $i++) {
    $cnt = 0;
    $x = count_chars(substr($s, 0, $i), 1);
    $y = count_chars(substr($s, $i, $n - $i), 1);
    foreach ($x as $idx => $v) {
        if (isset($y[$idx])) $cnt++;
    }
    $ans = max($ans, $cnt);
}
echo $ans;

exit;

// A
fscanf(STDIN, '%d %d', $a, $b);
echo max($a + $b, $a - $b, $a * $b);
