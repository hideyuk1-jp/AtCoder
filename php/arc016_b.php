<?php

list($n) = ints();
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    list($s[$i]) = strs();
    for ($j = 0; $j < 9; ++$j) {
        if ($s[$i][$j] === 'x') {
            ++$cnt;
        }
        if ($i > 0 && $s[$i][$j] !== 'o' && $s[$i - 1][$j] === 'o') {
            ++$cnt;
        }
        if ($i === $n - 1 && $s[$i][$j] === 'o') {
            ++$cnt;
        }
    }
}
echo $cnt . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
