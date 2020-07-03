<?php
list($s) = strs();
$p = strpos($s, 'C');
if ($p === false) exit('No' . PHP_EOL);
$p = strpos($s, 'F', $p);
echo $p !== false ? 'Yes' : 'No';
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
