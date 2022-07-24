<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    if (isset($cnt[$s])) {
        $cnt[$s]++;
    } else {
        $cnt[$s] = 1;
    }
}
$max = max($cnt);
echo array_flip($cnt)[$max] . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
