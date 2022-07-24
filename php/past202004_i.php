<?php

list($n) = ints();
$a = ints();
$_a = array_flip($a);
$ans = array_fill(0, 2 ** $n, 0);
$c = 2 ** $n;
while ($c > 1) {
    for ($i = 0; $i < $c; $i += 2) {
        $p1 = $a[$i];
        $p2 = $a[$i + 1];
        ++$ans[$_a[$p1]];
        ++$ans[$_a[$p2]];
        $a[intdiv($i, 2)] = max($p1, $p2);
    }
    $c = intdiv($c, 2);
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
