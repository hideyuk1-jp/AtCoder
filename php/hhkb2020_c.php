<?php

list($n) = ints();
$p = ints();
$nums = array_fill(0, $n + 1, true);
$cur = 0;
for ($i = 0; $i < $n; ++$i) {
    $nums[$p[$i]] = false;
    while (!$nums[$cur]) {
        ++$cur;
    }
    $ans[] = $cur;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
