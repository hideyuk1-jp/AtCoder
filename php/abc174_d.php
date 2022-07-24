<?php

list($n) = ints();
list($c) = strs();
$cntr = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($c[$i] === 'R') {
        ++$cntr;
    }
}
$cnt = 0;
for ($i = 0; $i < $cntr; ++$i) {
    if ($c[$i] === 'W') {
        ++$cnt;
    }
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
