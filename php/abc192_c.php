<?php

[$N, $K] = ints();
$a = $N;
while ($K > 0) {
    $t1 = $t2 = str_split((string)$a);
    sort($t1);
    rsort($t2);
    $a = (int)implode("", $t2) - (int)implode("", $t1);
    --$K;
}
echo $a;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
