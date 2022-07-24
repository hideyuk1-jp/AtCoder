<?php

list($s) = strs();
$cnt = 0;
$n = strlen($s);
for ($i = 1; $i < $n; ++$i) {
    if ($s[$i] !== $s[$i - 1]) {
        $cnt++;
    }
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
