<?php

list($s) = strs();
$k = 0;
$cnt = $cnt_zero = [];
for ($i = 0; $i < strlen($s); $i += 2) {
    if ($i > 0 && $s[$i - 1] === '+') {
        ++$k;
    }
    $cnt[$k] = true;
    if ($s[$i] === '0') {
        $cnt_zero[$k] = true;
    }
}
echo count($cnt) - count($cnt_zero) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
