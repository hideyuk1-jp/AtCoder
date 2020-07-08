<?php
list($s) = strs();
$n = strlen($s);
// 全ての組の個数
$c = (1 + $n - 1) * ($n - 1) / 2 + 1;
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$s[$i]])) ++$cnt[$s[$i]];
    else $cnt[$s[$i]] = 1;
}
foreach ($cnt as $i => $v) $c -= $v * ($v - 1) / 2;
echo $c;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
