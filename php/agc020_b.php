<?php

list($k) = ints();
$a = ints();
$maxn = $minn = 2;
for ($i = $k - 1; $i >= 0; --$i) {
    if (intdiv($maxn, $a[$i]) === intdiv($minn - 1, $a[$i])) {
        exit('-1');
    }
    $maxn = (intdiv($maxn, $a[$i]) + 1) * $a[$i] - 1;
    $minn = (intdiv($minn, $a[$i]) + min(1, $minn % $a[$i])) * $a[$i];
}
echo $minn . ' ' . $maxn;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
