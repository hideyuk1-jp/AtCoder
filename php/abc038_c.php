<?php
list($n) = ints();
$a = ints();
$c = 1;
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($i < $n - 1 && $a[$i + 1] > $a[$i]) {
        $c++;
    } else {
        $ans += ($c + 1) * $c / 2;
        $c = 1;
    }
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
