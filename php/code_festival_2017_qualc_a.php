<?php

list($s) = strs();
for ($i = 0; $i < strlen($s) - 1; ++$i) {
    if ($s[$i] === 'A' && $s[$i + 1] === 'C') {
        exit('Yes') . PHP_EOL;
    }
}
echo 'No' . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
