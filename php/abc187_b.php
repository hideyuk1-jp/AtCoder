<?php

fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d %d', $x[], $y[]);
}
$cnt = 0;
for ($i  = 0; $i < $n - 1; $i++) {
    for ($j  = $i; $j < $n; $j++) {
        $a = ($y[$i] - $y[$j]) / ($x[$i] - $x[$j]);
        if (abs($a) <= 1) {
            $cnt++;
        }
    }
}
echo $cnt;
