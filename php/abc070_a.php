<?php

list($n) = ints();
$s = (string) $n;
$l = strlen($s);
for ($i = 0; $i < intdiv($l, 2); ++$i) {
    if ($s[$i] !== $s[$l - $i - 1]) {
        exit('No');
    }
}
echo 'Yes';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
