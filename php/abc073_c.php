<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    if (isset($cnt[$a])) $cnt[$a]++;
    else $cnt[$a] = 1;
}
$ans = 0;
foreach ($cnt as $v) if ($v % 2) $ans++;
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
