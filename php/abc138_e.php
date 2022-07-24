<?php

list($s) = strs();
list($t) = strs();
$n = strlen($s);
$m = strlen($t);
$ss = $s . $s;
$cnt = 0;
$p = -1;
for ($i = 0; $i < $m; ++$i) {
    $np = strpos($ss, $t[$i], $p + 1);
    if ($np === false) {
        exit('-1');
    }
    $cnt += $np - $p;
    $p = $np % $n;
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
