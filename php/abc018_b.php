<?php

list($s) = strs();
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($l, $r) = ints();
    $s = substr_replace($s, strrev(substr($s, $l - 1, $r - $l + 1)), $l - 1, $r - $l + 1);
}
echo $s . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
