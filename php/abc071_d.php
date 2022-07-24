<?php

define('MOD', 10 ** 9 + 7);
list($n) = ints();
list($s1) = strs();
list($s2) = strs();
if ($s1[0] === $s2[0]) {
    $ans = 3;
} else {
    $ans = 3 * 2;
}
for ($i = 1; $i < $n; ++$i) {
    if ($s1[$i - 1] === $s1[$i] && $s2[$i - 1] === $s2[$i]) {
        continue;
    }

    if ($s1[$i] === $s2[$i]) {
        if ($s1[$i - 1] === $s2[$i - 1]) {
            $ans = ($ans * 2) % MOD;
        }
    } else {
        if ($s1[$i - 1] === $s2[$i - 1]) {
            $ans = ($ans * 2) % MOD;
        } else {
            $ans = ($ans * 3) % MOD;
        }
    }
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
