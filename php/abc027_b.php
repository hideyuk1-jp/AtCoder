<?php

list($n) = ints();
$a = ints();
$sum = array_sum($a);
if ($sum % $n) {
    exit('-1' . PHP_EOL);
}
$avg = intdiv($sum, $n);
$cp = $ans = 0;
for ($i = 0; $i < $n; ++$i) {
    $c = $cp + $a[$i] - $avg;
    if ($cp === 0 && $c !== 0) {
        $l = $i;
    }
    if ($cp !== 0 && $c === 0) {
        $ans += $i - $l;
        unset($l);
    }
    $cp = $c;
}
if (isset($l)) {
    $ans += $n - 1 - $l;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
