<?php

list($s) = strs();
$n = strlen($s);
$k = 0;
$a[$k] = 0;
for ($i = 0; $i < $n - 1; ++$i) {
    if ($s[$i] === '2' && $s[$i + 1] === '5') {
        ++$a[$k];
        ++$i;
        continue;
    }
    if ($a[$k] > 0) {
        ++$k;
        $a[$k] = 0;
    }
}
$ans = 0;
foreach ($a as $v) {
    $ans += (1 + $v) * $v / 2;
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
