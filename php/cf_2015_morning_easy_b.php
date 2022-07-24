<?php

[$N] = ints();
[$S] = strs();
if ($N % 2) {
    exit('-1' . PHP_EOL);
}
$cnt = 0;
for ($i = 0; $i < $N / 2; ++$i) {
    if ($S[$i] !== $S[$N / 2 + $i]) {
        ++$cnt;
    }
}
echo $cnt, PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
