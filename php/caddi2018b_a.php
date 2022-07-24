<?php

list($s) = strs();
$cnt = 0;
for ($i = 0; $i < strlen($s); ++$i) {
    if ($s[$i] === '2') {
        ++$cnt;
    }
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
