<?php

list($s) = strs();
$n = strlen($s);
$cs = 0; // 最終的に残るS
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === 'S') {
        $cs++;
    } elseif ($cs > 0) {
        $cs--;
    }
}
echo $cs * 2;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
