<?php

list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    if ($a[$i] === 0) {
        continue;
    }
    $cnt++;
}
echo array_sum($a) % $cnt ? intdiv(array_sum($a), $cnt) + 1 : intdiv(array_sum($a), $cnt);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
