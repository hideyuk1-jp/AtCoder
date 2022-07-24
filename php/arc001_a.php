<?php

list($n) = ints();
$c = array_map('intval', str_split(trim(fgets(STDIN))));
for ($i = 1; $i <= 4; ++$i) {
    $cnt[$i] = 0;
    for ($j = 0; $j < $n; ++$j) {
        if ($i === $c[$j]) {
            ++$cnt[$i];
        }
    }
}
echo implode(' ', [max($cnt), min($cnt)]);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
