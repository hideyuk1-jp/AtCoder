<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[], $b[]) = ints();
}
$c = 0;
for ($i = $n - 1; $i >= 0; --$i) {
    $c += ($b[$i] - ($c + $a[$i]) % $b[$i]) % $b[$i];
}
echo $c;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
