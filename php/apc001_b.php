<?php

list($n) = ints();
$a = ints();
$b = ints();
for ($i = 0; $i < $n; ++$i) {
    if ($a[$i] > $b[$i]) {
        $c1 += $a[$i] - $b[$i];
    } elseif ($a[$i] < $b[$i]) {
        $c2 += intdiv($b[$i] - $a[$i], 2);
    }
}
echo $c2 >= $c1 ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
