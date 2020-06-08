<?php
list($h, $w, $d) = ints();
for ($i = 0; $i < $h; $i++) {
    $a[] = ints();
}
for ($i = 0; $i < $h; $i++) {
    for ($j = 0; $j < $w; $j++) {
        $A[$a[$i][$j]] = [$i, $j];
    }
}
$n = $h * $w;
$cusum = array_fill(1, $d, 0);
for ($i = $d + 1; $i <= $n; $i++) {
    $cusum[$i] = $cusum[$i - $d] + abs($A[$i][0] - $A[$i - $d][0]) + abs($A[$i][1] - $A[$i - $d][1]);
}
list($q) = ints();
for ($i = 0; $i < $q; $i++) {
    list($l, $r) = ints();
    $ans[] = $cusum[$r] - $cusum[$l];
}
echo implode(PHP_EOL, $ans);

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
