<?php

list($s) = strs();
if ($s === '{}') {
    exit('dict' . PHP_EOL);
}
$d === 0;
for ($i = 0; $i < strlen($s); ++$i) {
    if ($s[$i] === '{') {
        ++$d;
    } elseif ($s[$i] === '}') {
        --$d;
    } elseif ($s[$i] === ':' && $d === 1) {
        exit('dict' . PHP_EOL);
    } elseif ($s[$i] === ',' && $d === 1) {
        exit('set' . PHP_EOL);
    }
}
echo 'set' . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
