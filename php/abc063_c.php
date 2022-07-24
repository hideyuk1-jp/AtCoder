<?php

list($n) = ints();
$sum = 0;
$a = [];
for ($i = 0; $i < $n; ++$i) {
    list($s[$i]) = ints();
    if ($s[$i] % 10) {
        $a[] = $s[$i];
    }
    $sum += $s[$i];
}
if ($sum % 10) {
    echo $sum;
    exit;
}
if (count($a) === 0) {
    exit('0');
}
echo $sum - min($a);

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
