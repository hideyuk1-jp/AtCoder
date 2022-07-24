<?php

list($s) = strs();
$t = 'CODEFESTIVAL2016';
$cnt = 0;
for ($i = 0; $i < strlen($s); ++$i) {
    if ($s[$i] !== $t[$i]) {
        ++$cnt;
    }
}
echo $cnt . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
