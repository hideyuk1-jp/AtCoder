<?php

list($s) = strs();
list($t) = strs();
if (strlen($s) !== strlen($t)) {
    exit('-1' . PHP_EOL);
}
$a = strpos($t . $t, $s);
echo $a === false ? -1 : $a;
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
