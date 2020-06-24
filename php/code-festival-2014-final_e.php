<?php
list($n) = ints();
$r = ints();
$cnt = 0;
$p = '';
for ($i = 0; $i < $n - 1; ++$i) {
    if ($r[$i] === $r[$i + 1]) continue;
    if ($r[$i] < $r[$i + 1]) $c = '<';
    else $c = '>';

    if ($p !== $c) {
        $p = $c;
        ++$cnt;
    }
}
++$cnt;
if ($cnt < 3) exit('0' . PHP_EOL);
echo $cnt . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
