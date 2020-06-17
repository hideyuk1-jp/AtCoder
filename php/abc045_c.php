<?php
list($s) = strs();
$n = strlen($s) - 1;
// bit全探索
$ans = 0;
for ($i = 0; $i < 2 ** $n; $i++) {
    $l = 0;
    for ($j = 0; $j < $n; $j++) {
        if (($i >> $j) & 1) {
            $ans += substr($s, $l, $j - $l + 1);
            $l = $j + 1;
        }
    }
    $ans += substr($s, $l);
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
