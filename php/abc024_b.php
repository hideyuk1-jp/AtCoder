<?php

list($n, $t) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[]) = ints();
}
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    $ans += min($t, ($a[$i + 1] ?? INF) - $a[$i]);
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
