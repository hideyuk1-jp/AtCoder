<?php

[$S] = strs();
$n = strlen($S);
$min = $n;
// bit全探索
for ($i = 0; $i < 2 ** $n; $i++) {
    $s = '';
    for ($j = 0; $j < $n; $j++) {
        if (($i >> $j) & 1) {
            $s .= $S[$j];
        }
    }
    if ((int)$s % 3 === 0) {
        $min = min($min, $n - strlen($s));
    }
}
echo $min < $n ? $min : '-1';
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
