<?php

list($n, $m) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[]) = strs();
}
$bb = '';
for ($i = 0; $i < $m; ++$i) {
    list($b[]) = strs();
    $bb .= $b[$i];
}
for ($i = 0; $i <= $n - $m; ++$i) {
    for ($j = 0; $j <= $n - $m; ++$j) {
        $aa = '';
        for ($k = 0; $k < $m; ++$k) {
            $aa .= substr($a[$k + $i], $j, $m);
        }
        if ($aa === $bb) {
            exit('Yes');
        }
    }
}
echo 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
