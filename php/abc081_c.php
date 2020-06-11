<?php
list($n, $k) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$a[$i]])) $cnt[$a[$i]]++;
    else $cnt[$a[$i]] = 1;
}
sort($cnt);
$ans = 0;
foreach ($cnt as $c) {
    if (count($cnt) <= $k) break;
    $ans += $c;
    $k++;
}
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
