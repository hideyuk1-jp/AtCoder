<?php
list($s) = strs();
$s = strtolower($s);
$i = 0;
foreach (['i', 'c', 't'] as $v) {
    $i = strpos($s, $v, $i);
    if ($i === false) exit('NO' . PHP_EOL);
}
echo 'YES' . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
