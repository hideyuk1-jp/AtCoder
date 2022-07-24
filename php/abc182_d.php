<?php

[$N] = ints();
$a = ints();
$ans = $max = $sum = $cusum = 0;
for ($i = 0; $i < $N; ++$i) {
    $ans = max($ans, $cusum + $max, $cusum + $sum + $a[$i]);
    $sum += $a[$i];
    $cusum += $sum;
    $max = max($max, $sum);
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
