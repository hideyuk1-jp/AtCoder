<?php

[$n] = ints();
$a = ints();
$min = PHP_INT_MAX;
// bit全探索
for ($i = 0; $i < 2 ** ($n - 1); $i++) {
    $ors = [$a[0]];
    $k = 0;
    for ($j = 0; $j < $n - 1; $j++) {
        if (($i >> $j) & 1) {
            $k++;
            $ors[$k] = $a[$j + 1];
        } else {
            $ors[$k] |= $a[$j + 1];
        }
    }
    $xor = $ors[0];
    for ($j = 1; $j < count($ors); ++$j) {
        $xor ^= $ors[$j];
    }
    $min = min($min, $xor);
}
echo $min;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
