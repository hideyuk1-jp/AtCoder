<?php
list($s) = strs();
$cnt = 0;
for ($i = 0; $i < strlen($s); ++$i)
    if ($s[$i] === '1') ++$cnt;
echo $cnt . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
