<?php

$c[] = ints();
$c[] = ints();
$c[] = ints();
for ($a[0] = 0; $a[0] <= 100; $a[0]++) {
    $b[0] = $c[0][0] - $a[0];
    $b[1] = $c[0][1] - $a[0];
    $b[2] = $c[0][2] - $a[0];
    $a[1] = $c[1][0] - $b[0];
    $a[2] = $c[2][0] - $b[0];
    for ($i = 1; $i < 3; $i++) {
        for ($j = 1; $j < 3; $j++) {
            if ($c[$i][$j] !== $a[$i] + $b[$j]) {
                continue 3;
            }
        }
    }
    exit('Yes');
}
echo 'No';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
