<?php

list($a, $b, $c) = ints();
list($k) = ints();
$cnt = 0;
while ($b <= $a) {
    $b *= 2;
    ++$cnt;
}
while ($c <= $b) {
    $c *= 2;
    ++$cnt;
}
echo $cnt <= $k ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
