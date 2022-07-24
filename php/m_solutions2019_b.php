<?php

list($s) = strs();
$cntx = 0;
$k = strlen($s);
for ($i = 0; $i < $k; ++$i) {
    if ($s[$i] === 'x') {
        ++$cntx;
    }
}
echo $cntx <= 7 ? 'YES' : 'NO';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
