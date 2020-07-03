<?php
list($n) = ints();
$t = str_split('indeednow');
sort($t, SORT_STRING);
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    $s = str_split($s);
    sort($s, SORT_STRING);
    if ($s === $t) $ans[] = 'YES';
    else $ans[] = 'NO';
}
echo implode(PHP_EOL, $ans) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
