<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[]) = ints();
    $cnt[$a[$i]] = true;
}
$keys = array_keys($cnt);
sort($keys);
$comb = array_flip($keys);
for ($i = 0; $i < $n; ++$i) {
    $b[] = $comb[$a[$i]];
}
echo implode(PHP_EOL, $b);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
