<?php

list($s) = strs();
$n = strlen($s);
$ans = $cntB = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === 'B') {
        $ans -= $i;
        ++$cntB;
    }
}
$ans += ($n - 1 + ($n - $cntB)) * $cntB / 2;
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
