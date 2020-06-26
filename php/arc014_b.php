<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    if (isset($ans)) continue;
    if ($i > 0 && $p[strlen($p) - 1] !== $s[0]) $ans = $i % 2 ? 'WIN' : 'LOSE';
    if (isset($cnt[$s])) $ans = $i % 2 ? 'WIN' : 'LOSE';
    else $cnt[$s] = true;
    $p = $s;
}
if (!isset($ans)) $ans = 'DRAW';
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
