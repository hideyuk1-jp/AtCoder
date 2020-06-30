<?php
list($s) = strs();
$t[] = '';
for ($i = $j = 0; $i < strlen($s); ++$i) {
    if ($i < strlen($s) - 1 && $s[$i] === 'B' && $s[$i + 1] === 'C') {
        if (isset($t[$j])) $t[$j] .= 'D';
        else $t[$j] = 'D';
        ++$i;
    } elseif ($s[$i] === 'B' || $s[$i] === 'C') {
        if (isset($t[$j])) ++$j;
    } else {
        if (isset($t[$j])) $t[$j] .= $s[$i];
        else $t[$j] = $s[$i];
    }
}
$cnt = 0;
foreach ($t as $v) {
    for ($i = 0, $j = strlen($v) - 1; $i < strlen($v); ++$i) {
        if ($v[$i] === 'A') {
            $cnt += $j - $i;
            --$j;
        }
    }
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
