<?php

[$s, $p] = ints();
$d = divisors($p);
for ($i = 0; $i < count($d); ++$i) {
    $tmp = $p / $d[$i];
    if ($d[$i] + $tmp === $s) {
        exit('Yes');
    }
}
echo 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
// 約数列挙
function divisors($max)
{
    $arr = [];
    $rmax = (int) floor(sqrt($max));
    for ($i = 1; $i <= $rmax; $i++) {
        if ($max % $i === 0) {
            $arr[] = $i;
            $arr[] = $max / $i;
        }
    }
    sort($arr);
    return array_unique($arr);
}
