<?php
list($s) = strs();
for ($i = strlen($s) - 2; $i >= 2; $i -= 2) {
    if (isGumoji(substr($s, 0, $i))) {
        echo $i;
        exit;
    }
}

function isGumoji($s)
{
    $l = strlen($s);
    if ($l % 2) return false;
    for ($i = 0; $i < intdiv($l, 2); ++$i) {
        if ($s[$i] !== $s[$i + intdiv($l, 2)]) return false;
    }
    return true;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
