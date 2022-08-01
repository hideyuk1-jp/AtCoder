<?php

[$s] = strs();
$ans = '';
for ($i = strlen($s) - 1; $i >= 0; --$i) {
    if ($s[$i] === '6') {
        $ans .= '9';
    } elseif ($s[$i] === '9') {
        $ans .= '6';
    } else {
        $ans .= $s[$i];
    }
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
