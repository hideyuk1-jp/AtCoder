<?php
list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$a[$i]])) $cnt[$a[$i]]++;
    else $cnt[$a[$i]] = 1;
}
$c = 0;
foreach ($cnt as $v) $c += $v - 1;
echo $c % 2 ? count($cnt) - 1 : count($cnt);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
