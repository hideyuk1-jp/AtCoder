<?php

list($s) = strs();
$n = strlen($s);
if (isKaibun($s)) {
    exit('0');
}
$l = 0;
$r = $n - 1;
$cnt = 0;
while (true) {
    if ($s[$l] === $s[$r]) {
        ++$l;
        --$r;
    } else {
        if ($s[$l] !== 'x' && $s[$r] !== 'x') {
            exit('-1');
        }
        if ($s[$l] !== 'x') {
            --$r;
        } else {
            ++$l;
        }
        ++$cnt;
    }
    if ($l >= $r) {
        break;
    }
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function isKaibun($s)
{
    $n = strlen($s);
    for ($i = 0; $i < intdiv($n, 2); $i++) {
        if ($s[$i] !== $s[$n - $i - 1]) {
            return false;
        }
    }
    return true;
}
