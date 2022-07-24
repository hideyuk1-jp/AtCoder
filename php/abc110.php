<?php

// C
fscanf(STDIN, '%s', $s);
fscanf(STDIN, '%s', $t);
$n = strlen($s);
$ans = 'Yes';
for ($i = 0; $i < $n; $i++) {
    if (isset($g[$t[$i]])) {
        if ($g[$t[$i]] !== $s[$i]) {
            $ans = 'No';
            break;
        }
    } else {
        $g[$t[$i]] = $s[$i];
    }

    if (isset($g2[$s[$i]])) {
        if ($g2[$s[$i]] !== $t[$i]) {
            $ans = 'No';
            break;
        }
    } else {
        $g2[$s[$i]] = $t[$i];
    }
}
echo $ans;

exit;

// B
fscanf(STDIN, '%d %d %d %d', $N, $M, $X, $Y);
$x = array_map('intval', explode(' ', trim(fgets(STDIN))));
$y = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = (max($x) < $Y && min($y) > $X && max($x) < min($y)) ? 'No War' : 'War';
echo $ans;

exit;

// A
fscanf(STDIN, '%d %d %d', $a, $b, $c);
$ans = max($a, $b, $c) * 9 + $a + $b + $c;
echo $ans;
