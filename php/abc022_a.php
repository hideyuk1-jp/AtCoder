<?php

list($n, $s, $t) = ints();
list($w) = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($i > 0) {
        list($a) = ints();
        $w += $a;
    }
    if ($w >= $s && $w <= $t) {
        $ans++;
    }
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
