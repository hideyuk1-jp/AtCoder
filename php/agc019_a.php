<?php
list($q, $h, $s, $d) = ints();
list($n) = ints();
$min2l = min($q * 8, $h * 4, $s * 2, $d);
$min1l = min($q * 4, $h * 2, $s);
echo intdiv($n, 2) * $min2l + ($n % 2) * $min1l;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
