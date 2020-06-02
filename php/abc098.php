<?php
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
