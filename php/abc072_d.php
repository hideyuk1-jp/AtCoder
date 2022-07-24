<?php

list($n) = ints();
$p = ints();
$ans = $cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($p[$i] === $i + 1) {
        $cnt++;
    } else {
        if ($cnt > 0) {
            $ans += (int) ceil($cnt / 2);
        }
        $cnt = 0;
    }
    if ($i === $n - 1 && $cnt > 0) {
        $ans += (int) ceil($cnt / 2);
    }
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
