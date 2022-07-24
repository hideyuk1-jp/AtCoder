<?php

$n = 4;
for ($i = 0; $i < $n; ++$i) {
    $a[] = ints();
}
for ($i = 0; $i < $n; ++$i) {
    for ($j = 0; $j < $n; ++$j) {
        if ($i + 1 < $n && $a[$i][$j] === $a[$i + 1][$j]) {
            exit('CONTINUE' . PHP_EOL);
        }
        if ($j + 1 < $n && $a[$i][$j] === $a[$i][$j + 1]) {
            exit('CONTINUE' . PHP_EOL);
        }
    }
}
echo 'GAMEOVER' . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
