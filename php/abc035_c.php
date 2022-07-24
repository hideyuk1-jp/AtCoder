<?php

list($n, $q) = ints();
$imos = array_fill(0, $n, 0);
for ($i = 0; $i < $q; ++$i) {
    list($l, $r) = ints();
    --$l;
    --$r;
    ++$imos[$l];
    if (isset($imos[$r + 1])) {
        --$imos[$r + 1];
    }
}
for ($i = 0; $i < $n - 1; ++$i) {
    $imos[$i + 1] += $imos[$i];
}
$a = '';
for ($i = 0; $i < $n; ++$i) {
    $a .= $imos[$i] % 2 ? '1' : '0';
}
echo $a . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
