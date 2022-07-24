<?php

list($L, $R) = ints();
$l = ints();
$r = ints();
$cntL = $cntR = array_fill(10, 31, 0);
for ($i = 0; $i < max($L, $R); ++$i) {
    if (isset($l[$i])) {
        ++$cntL[$l[$i]];
    }
    if (isset($r[$i])) {
        ++$cntR[$r[$i]];
    }
}
$ans = 0;
foreach ($cntL as $i => $v) {
    $ans += min($v, $cntR[$i]);
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
