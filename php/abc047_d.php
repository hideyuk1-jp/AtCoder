<?php
list($n, $t) = ints();
$a = ints();
$min = $a[0];
$maxd = 0;
for ($i = 1; $i < $n; ++$i) {
    $min = min($min, $a[$i - 1]);
    $d = $a[$i] - $min;
    if (isset($cnt[$d])) ++$cnt[$d];
    else $cnt[$d] = 1;
}
ksort($cnt);
echo array_pop($cnt);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
