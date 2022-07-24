<?php

list($n) = ints();
$a = ints();
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($i === $a[$a[$i] - 1] - 1) {
        ++$cnt;
    }
}
echo intdiv($cnt, 2) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
