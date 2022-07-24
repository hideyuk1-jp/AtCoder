<?php

list($s) = strs();
$a = ['KIH', 'B', 'R'];
for ($i = 0; $i < 2 ** 4; ++$i) {
    $t = '';
    for ($j = 0; $j < 4; ++$j) {
        if ($i >> $j & 1) {
            $t .= 'A';
        }
        $t .= ($a[$j] ?? '');
    }
    if ($t === $s) {
        exit('YES' . PHP_EOL);
    }
}
echo 'NO' . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
