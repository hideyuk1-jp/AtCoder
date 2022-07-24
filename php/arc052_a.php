<?php

list($s) = strs();
$ans = '';
for ($i = 0; $i < strlen($s); ++$i) {
    if (is_numeric($s[$i])) {
        $ans .= $s[$i];
    }
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
