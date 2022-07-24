<?php

list($n) = ints();
list($s) = strs();
$cntR = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === 'R') {
        ++$cntR;
    }
}
echo $cntR > intdiv($n, 2) ? 'Yes' : 'No';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
