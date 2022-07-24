<?php

list($o) = strs();
list($e) = strs();
$ans = '';
for ($i = 0; $i < strlen($o); ++$i) {
    $ans .= $o[$i];
    if ($i < strlen($e)) {
        $ans .= $e[$i];
    }
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
