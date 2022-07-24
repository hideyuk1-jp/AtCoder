<?php

$cnt = [0, 0, 0, 0];
for ($i = 0; $i < 3; ++$i) {
    list($a, $b) = ints();
    ++$cnt[--$a];
    ++$cnt[--$b];
}
echo max($cnt) <= 2 ? 'YES' : 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
