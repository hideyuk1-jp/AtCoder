<?php

[$N] = ints();
$a = ints();
$max_a = max($a);
$max_cnt = 0;
$ans = $max_a;
for ($k = 2; $k <= $max_a; ++$k) {
    $cnt = 0;
    for ($i = 0; $i < $N; ++$i) {
        if ($a[$i] % $k === 0) {
            ++$cnt;
        }
    }
    if ($cnt > $max_cnt) {
        $max_cnt = $cnt;
        $ans = $k;
    }
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
