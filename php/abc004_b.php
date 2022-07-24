<?php

for ($i = 0; $i < 4; ++$i) {
    $c[] = strs();
}
for ($i = 0; $i < 4; ++$i) {
    for ($j = 0; $j < 4; ++$j) {
        $cc[$i][$j] = $c[3 - $i][3 - $j];
    }
}
for ($i = 0; $i < 4; ++$i) {
    echo implode(' ', $cc[$i]) . PHP_EOL;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
