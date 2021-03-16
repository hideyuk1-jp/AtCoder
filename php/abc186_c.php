<?php
fscanf(STDIN, '%d', $n);
$cnt = 0;
for ($i  = 1; $i <= $n; $i++) {
    $nn = $i;
    while ($nn > 0) {
        if ($nn % 10 === 7) continue 2;
        $nn = intdiv($nn, 10);
    }
    $nn = $i;
    while ($nn > 0) {
        if ($nn % 8 === 7) continue 2;
        $nn = intdiv($nn, 8);
    }
    $cnt++;
}
echo $cnt;
