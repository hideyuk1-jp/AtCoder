<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[], $b[]) = ints();
}
array_multisort($a, SORT_DESC, $b);
echo($a[0] + $b[0]) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
