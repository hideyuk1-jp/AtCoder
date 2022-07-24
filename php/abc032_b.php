<?php

list($s) = strs();
list($k) = ints();
$n = strlen($s);
if ($k > $n) {
    exit('0' . PHP_EOL);
}
for ($i = 0; $i < $n - $k + 1; ++$i) {
    $cnt[substr($s, $i, $k)] = true;
}
echo count($cnt) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
