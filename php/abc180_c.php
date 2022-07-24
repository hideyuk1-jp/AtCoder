<?php

[$N] = ints();
echo implode(PHP_EOL, divisors($N));
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
