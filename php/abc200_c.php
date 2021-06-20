<?php
[$N] = ints();
$a = ints();
$cnt = [];
for ($i = 0; $i < $N; ++$i) {
    $r = $a[$i] % 200;
    if (isset($cnt[$r])) {
        ++$cnt[$r];
    } else {
        $cnt[$r] = 1;
    }
}
$ans = 0;
foreach ($cnt as $c) {
    $ans += $c * ($c - 1) / 2;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
