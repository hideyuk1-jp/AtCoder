<?php
list($n) = ints();
$a = ints();
$b = ints();
$suma = array_sum($a);
$sumb = array_sum($b);
if ($sumb > $suma) exit('-1');
$md = $pd = [];
for ($i = 0; $i < $n; ++$i) {
    $d = $a[$i] - $b[$i];
    if ($d < 0) $md[] = $d;
    elseif ($d > 0) $pd[] = $d;
}
if (count($md) === 0) exit('0');
$ans = count($md);
$sum_md = array_sum($md);
$i = 0;
rsort($pd);
while ($sum_md < 0) {
    $sum_md += $pd[$i];
    ++$i;
}
$ans += $i;
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
