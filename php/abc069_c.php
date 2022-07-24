<?php

list($n) = ints();
$a = ints();
$cnt4 = $cnt2 = $cnt1 = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($a[$i] % 4 === 0) {
        $cnt4++;
    } elseif ($a[$i] % 2 === 0) {
        $cnt2++;
    } else {
        $cnt1++;
    }
}
if ($cnt2 > 0) {
    echo $cnt4 >= $cnt1 ? 'Yes' : 'No';
} else {
    echo $cnt4 >= $cnt1 - 1 ? 'Yes' : 'No';
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
