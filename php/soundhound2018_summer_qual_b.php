<?php

list($s) = strs();
list($w) = ints();
$a = str_split($s, $w);
$ans = '';
for ($i = 0; $i < count($a); ++$i) {
    $ans .= $a[$i][0];
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
