<?php

[$a, $b] = ints();
echo max(f($a), f($b));
function f($n)
{
    $s = strval($n);
    $ret = 0;
    for ($i = 0; $i < strlen($s); ++$i) {
        $ret += intval($s[$i]);
    }
    return $ret;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
