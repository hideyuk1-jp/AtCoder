<?php
list($n) = ints();
$pd = -1;
$cnt = $con = 0;
for ($t = 0; $t < 4; ++$t) {
    $d = intdiv($n, 10 ** $t) % 10;
    if ($d === $pd) $con++;
    else $con = 1;
    $cnt = max($cnt, $con);
    $pd = $d;
}
echo $cnt >= 3 ? 'Yes' : 'No';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
