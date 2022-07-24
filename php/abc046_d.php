<?php

list($s) = strs();
$n = strlen($s);
$cnt = $ans = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === 'g') {
        $cnt++;
    } else {
        $cnt--;
    }
}
echo intdiv($cnt, 2);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
