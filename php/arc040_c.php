<?php
list($n) = ints();
$cnt = 0;
$r = $n;
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    $flag = false;
    for ($j = $r - 1; $j >= 0; --$j) {
        if ($s[$j] === '.') {
            $r = $j;
            $flag = true;
            break;
        }
    }
    if ($flag) ++$cnt;
    else $r = $n;
}
echo $cnt, PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
