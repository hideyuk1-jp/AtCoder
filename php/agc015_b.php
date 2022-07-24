<?php

list($s) = strs();
$n = strlen($s);
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === 'U') {
        $cnt += $n - $i - 1; // 自分より上の階
        $cnt += $i * 2; // 自分より下の階
    } else {
        $cnt += ($n - $i - 1) * 2; // 自分より上の階
        $cnt += $i; // 自分より下の階
    }
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
