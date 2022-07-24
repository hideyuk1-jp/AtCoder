<?php

list($txa, $tya, $txb, $tyb, $t, $v) = ints();
list($n) = ints();
$ans = 'NO';
for ($i = 0; $i < $n; ++$i) {
    list($x, $y) = ints();
    $d = dist($x, $y, $txa, $tya) + dist($x, $y, $txb, $tyb);
    if ($d <= $t * $v) {
        $ans = 'YES';
    }
}
echo $ans . PHP_EOL;
function dist($x, $y, $xx, $yy)
{
    return sqrt(($xx - $x) ** 2 + ($yy - $y) ** 2);
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
