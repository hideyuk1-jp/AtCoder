<?php
list($n, $a, $b) = ints();
$ans = 0;
for ($i = 1; $i <= $n; ++$i) {
    $num = array_sum(str_split((string) $i));
    if ($num >= $a && $num <= $b) $ans += $i;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
