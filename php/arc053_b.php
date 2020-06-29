<?php
list($s) = strs();
for ($i = 0; $i < strlen($s); ++$i) {
    if (isset($cnt[$s[$i]])) ++$cnt[$s[$i]];
    else $cnt[$s[$i]] = 1;
}
$pair = $nopair = 0;
foreach ($cnt as $v) {
    $pair += intdiv($v, 2);
    $nopair += $v % 2;
}
if ($nopair === 0) exit((string) ($pair * 2));
echo intdiv($pair, $nopair) * 2 + 1;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
