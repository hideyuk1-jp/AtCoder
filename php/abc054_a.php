<?php
list($a, $b) = ints();
for ($i = 0; $i <= 11; ++$i) $s[$i + 2] = $i;
$s[1] = $i;
if ($s[$a] > $s[$b]) $ans = 'Alice';
elseif ($s[$a] < $s[$b]) $ans = 'Bob';
else $ans = 'Draw';
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
