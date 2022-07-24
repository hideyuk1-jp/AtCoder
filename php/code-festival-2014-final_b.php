<?php

list($s) = strs();
$ans = 0;
for ($i = 0; $i < strlen($s); ++$i) {
    if ($i % 2) {
        $ans -= $s[$i];
    } else {
        $ans += $s[$i];
    }
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
