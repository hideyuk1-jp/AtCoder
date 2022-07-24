<?php

list($w) = strs();
$ans = '';
for ($i = 0; $i < strlen($w); ++$i) {
    if (strpos('aiueo', $w[$i]) !== false) {
        continue;
    }
    $ans .= $w[$i];
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
