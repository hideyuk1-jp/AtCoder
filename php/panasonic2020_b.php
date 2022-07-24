<?php

list($h, $w) = ints();
if ($h === 1 || $w === 1) {
    exit('1');
}
echo(intdiv($h, 2) + $h % 2) * (intdiv($w, 2) + $w % 2) + intdiv($h, 2) * intdiv($w, 2);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
