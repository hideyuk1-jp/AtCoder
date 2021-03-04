<?php
$a = ints();
$n = count($a);
$ans = 'No';
for ($i = 0; $i < 2 ** $n; ++$i) {
    $cnt = 0;
    for ($j = 0; $j < $n; $j++) {
        if (($i >> $j) & 1) {
            $cnt += $a[$j];
        }
    }
    if ($cnt * 2 === array_sum($a)) $ans = 'Yes';
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
