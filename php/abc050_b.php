<?php
list($n) = ints();
$t = ints();
$sum = array_sum($t);
list($m) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($p, $x) = ints();
    --$p;
    $ans[] = $sum - $t[$p] + $x;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
