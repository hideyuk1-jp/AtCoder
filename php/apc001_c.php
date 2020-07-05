<?php
list($n) = ints();
echo '0' . PHP_EOL;
list($s) = strs();
$l = 0;
$r = $n;
$start = $s;
while ($s !== 'Vacant') {
    $mid = intdiv($r + $l, 2);
    echo $mid . PHP_EOL;
    list($s) = strs();
    if ($s === 'Vacant') exit;
    if ($mid % 2) {
        if ($start === 'Male') {
            if ($s === 'Male') $r = $mid;
            else $l = $mid;
        } else {
            if ($s === 'Male') $l = $mid;
            else $r = $mid;
        }
    } else {
        if ($start === 'Male') {
            if ($s === 'Male') $l = $mid;
            else $r = $mid;
        } else {
            if ($s === 'Male') $r = $mid;
            else $l = $mid;
        }
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
