<?php
list($n, $a) = ints();
$x = ints();
for ($i = 0; $i < $n; ++$i) $x[$i] -= $a;
$cnt = 0;
for ($i = 0; $i < 2 ** $n; ++$i) {
    $sum = 0;
    for ($j = 0; $j < $n; ++$j) if ($i >> $j & 1) $sum += $x[$j];
    if ($sum === 0) ++$cnt;
}
echo $cnt - 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
