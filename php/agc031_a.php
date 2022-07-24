<?php

define('MOD', 10 ** 9 + 7);
list($n) = ints();
list($s) = strs();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$s[$i]])) {
        ++$cnt[$s[$i]];
    } else {
        $cnt[$s[$i]] = 1;
    }
}
$ans = 1;
foreach ($cnt as $c) {
    $ans = $ans * ($c + 1) % MOD;
}
echo $ans - 1;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
