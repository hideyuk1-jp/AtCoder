<?php

list($n, $c, $k) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($t[]) = ints();
}
sort($t);
$cnt = $nbus = $num = 0;
foreach ($t as $tt) {
    if ($tt <= $nbus && $num < $c) {
        ++$num;
        continue;
    }
    $nbus = $tt + $k;
    $num = 1;
    ++$cnt;
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
