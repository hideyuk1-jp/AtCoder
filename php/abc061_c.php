<?php
list($n, $k) = ints();
for ($i = 0; $i < $n; ++$i) list($a[], $b[]) = ints();
array_multisort($a, SORT_ASC, $b);
$i = 0;
while ($k > 0) {
    $ans = $a[$i];
    $k -= $b[$i];
    $i++;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
