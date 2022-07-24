<?php

fscanf(STDIN, '%d %d %d', $n, $s, $d);
$ans = 'No';
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d %d', $x, $y);
    if ($x < $s and $y > $d) {
        $ans = 'Yes';
    }
}
echo $ans;
