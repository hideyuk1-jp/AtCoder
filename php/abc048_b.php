<?php
list($a, $b, $x) = ints();
$ans = intdiv($b, $x) - intdiv($a, $x) + 1;
if ($a % $x) --$ans;
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
