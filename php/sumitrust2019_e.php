<?php

define('MOD', 10 ** 9 + 7);
list($n) = ints();
$a = ints();
$cnt = [0, 0, 0];
$ans = 1;
for ($i = 0; $i < $n; ++$i) {
    $tmp = 0;
    for ($k = 0; $k < 3; ++$k) {
        if ($a[$i] === $cnt[$k]) {
            $tmpk = $k;
            ++$tmp;
        }
    }
    ++$cnt[$tmpk];
    $ans = ($ans * $tmp) % MOD;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
