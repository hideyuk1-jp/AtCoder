<?php

list($n) = ints();
$bg = 10 ** 6 + 1;
$cnt = array_fill(0, $bg, 0);
for ($i = 0; $i < $n; ++$i) {
    list($a, $b) = ints();
    $cnt[$a]++;
    if ($b < $bg - 1) {
        $cnt[$b + 1]--;
    }
}
$max = 0;
for ($i = 0; $i < $bg; ++$i) {
    $cnt[$i] += $cnt[$i - 1] ?? 0;
    $max = max($max, $cnt[$i]);
}
echo $max . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
