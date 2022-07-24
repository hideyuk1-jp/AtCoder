<?php

list($s) = strs();
list($t) = strs();
$s = str_split($s);
$t = str_split($t);
natsort($s);
natsort($t);
$s = implode('', $s);
$t = strrev(implode('', $t));
echo strnatcmp($s, $t) < 0 ? 'Yes' : 'No';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
