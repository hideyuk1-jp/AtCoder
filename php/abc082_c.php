<?php
list($n) = ints();
$a = ints();
$cnt = [];
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$a[$i]])) $cnt[$a[$i]]++;
    else $cnt[$a[$i]] = 1;
}
$ans = 0;
foreach ($cnt as $i => $v) {
    if ($i <= $v) $ans += $v - $i;
    else $ans += $v;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
