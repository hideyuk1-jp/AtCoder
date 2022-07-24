<?php

list($n) = ints();
$a = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    $ans += $a[$i] * 2 ** ($n - 1 - $i);
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
