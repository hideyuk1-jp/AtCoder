<?php

list($n, $x) = ints();
$a = ints();
$ans = 0;
for ($i = 0; $i < $n; $i++) {
    if (($x >> $i) & 1) {
        $ans += $a[$i];
    }
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
