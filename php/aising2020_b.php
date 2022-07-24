<?php

list($n) = ints();
$a = ints();
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($i % 2 === 0 && $a[$i] % 2) {
        ++$cnt;
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
