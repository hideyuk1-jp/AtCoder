<?php

list($x) = strs();
if ($x === '') {
    exit('YES' . PHP_EOL);
}
for ($i = 0; $i < strlen($x); ++$i) {
    if ($x[$i] === 'o' || $x[$i] === 'k' || $x[$i] === 'u') {
        continue;
    }
    if ($i < strlen($x) - 1 && $x[$i] === 'c' && $x[$i + 1] === 'h') {
        ++$i;
        continue;
    }
    exit('NO' . PHP_EOL);
}
echo 'YES' . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
