<?php

list($a) = strs();
list($b) = strs();

$l = strlen($a);
$_a = $_b = '';
for ($i = 0; $i < $l; ++$i) {
    if ($a[$i] !== $b[$i]) {
        $_a .= $a[$i];
        $_b .= $b[$i];
    }
    if (isset($cnt[$a[$i]])) {
        ++$cnt[$a[$i]];
    } else {
        $cnt[$a[$i]] = 1;
    }
}

$_l = strlen($_a);
if ($_l > 6) {
    exit('NO');
}

$_sa = str_split($_a);
$_sb = str_split($_b);
sort($_sa, SORT_STRING);
sort($_sb, SORT_STRING);
if ($_sa !== $_sb) {
    exit('NO');
}

if ($_l === 0 && max($cnt) > 1) {
    exit('YES');
}
dfs($_a);
echo 'NO';
function dfs($a, $d = 0)
{
    global $_l, $_b, $cnt;
    if ($d === 3) {
        return;
    }
    for ($i = 0; $i < $_l - 1; ++$i) {
        for ($j = $i + 1; $j < $_l; ++$j) {
            list($a[$i], $a[$j]) = [$a[$j], $a[$i]];
            if ($a === $_b && ($d + 1 === 3 || max($cnt) > 1)) {
                exit('YES');
            }
            dfs($a, $d + 1);
            list($a[$i], $a[$j]) = [$a[$j], $a[$i]];
        }
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
