<?php

list($n) = ints();
$a = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    for ($j = 1; $j <= $a[$i]; ++$j) {
        if ($j % 2 === 0 || $j % 3 === 2) {
            continue;
        }
        $ok = $j;
    }
    $ans += $a[$i] - $ok;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
