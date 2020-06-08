<?php
list($n) = ints();
for ($i = 0; $i < $n; $i++) {
    list($t[], $x[], $y[]) = ints();
}
$ct = $cx = $cy = 0;
for ($i = 0; $i < $n; $i++) {
    $d = abs($x[$i] - $cx) + abs($y[$i] - $cy);
    $dt = $t[$i] - $ct;
    if ($d > $dt || ($dt - $d) % 2) exit('No');
    $ct = $t[$i];
    $cx = $x[$i];
    $cy = $y[$i];
}
echo 'Yes';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
