<?php

list($a, $b) = ints();
if ($a <= 0 && $b >= 0) {
    exit('Zero');
}
$cntMinus = max(0, -$a) - max(0, - ($b + 1));
echo $cntMinus % 2 ? 'Negative' : 'Positive';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
