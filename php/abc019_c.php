<?php

list($n) = ints();
$a = ints();
sort($a);
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    while ($a[$i] % 2 === 0) {
        $a[$i] = intdiv($a[$i], 2);
    }
    if (!isset($c[$a[$i]])) {
        $ans++;
        $c[$a[$i]] = true;
    }
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
