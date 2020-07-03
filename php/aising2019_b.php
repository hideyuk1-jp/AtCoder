<?php
list($n) = ints();
list($a, $b) = ints();
$p = ints();
$cnt1 = $cnt2 = $cnt3 = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($p[$i] <= $a) ++$cnt1;
    elseif ($p[$i] <= $b) ++$cnt2;
    else ++$cnt3;
}
echo min($cnt1, $cnt2, $cnt3);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
