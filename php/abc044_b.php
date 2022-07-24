<?php

list($w) = strs();
for ($i = 0; $i < strlen($w); ++$i) {
    if (isset($c[$w[$i]])) {
        $c[$w[$i]]++;
    } else {
        $c[$w[$i]] = 1;
    }
}
foreach ($c as $v) {
    if ($v % 2) {
        exit('No');
    }
}
echo 'Yes';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
