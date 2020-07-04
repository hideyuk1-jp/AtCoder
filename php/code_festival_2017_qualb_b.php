<?php
list($n) = ints();
$d = ints();
list($m) = ints();
$t = ints();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$d[$i]])) ++$cnt[$d[$i]];
    else $cnt[$d[$i]] = 1;
}
for ($i = 0; $i < $m; ++$i) {
    if (isset($cnt[$t[$i]])) --$cnt[$t[$i]];
    else exit('NO');
}
echo min($cnt) >= 0 ? 'YES' : 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
