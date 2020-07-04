<?php
list($n, $m) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$a[$i]])) ++$cnt[$a[$i]];
    else $cnt[$a[$i]] = 1;
}
$max = PHP_INT_MIN;
$ans = '?';
foreach ($cnt as $i => $v) {
    if ($v > $max && $v > intdiv($n, 2)) {
        $max = $v;
        $ans = $i;
    }
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
