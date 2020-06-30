<?php
list($n, $a, $b) = ints();
if ($a > $b) exit('0');
if ($a === $b) exit('1');
if ($n === 1) exit('0');
echo ($b - $a) * ($n - 2) + 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
