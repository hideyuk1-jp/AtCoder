<?php
[$N, $W] = ints();
$sum = array_fill(0, 2 * 10 ** 5 + 1, 0);
for ($i = 0; $i < $N; ++$i) {
    [$S, $T, $P] = ints();
    $sum[$S] += $P;
    $sum[$T] -= $P;
}
for ($i = 0; $i < 2 * 10 ** 5; ++$i) {
    $sum[$i + 1] += $sum[$i];
}
echo max($sum) <= $W ? 'Yes' : "No", PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
