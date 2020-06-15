<?php
list($x, $a, $b) = ints();
if ($b <= $a) $ans = 'delicious';
elseif ($b <= $a + $x) $ans = 'safe';
else $ans = 'dangerous';
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
