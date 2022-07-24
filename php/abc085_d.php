<?php

list($n, $h) = ints();
for ($i = 0; $i < $n; $i++) {
    list($a[], $b[]) = ints();
}
$max_a = max($a);
$cnt = 0;
rsort($b);
for ($i = 0; $i < $n; $i++) {
    if ($b[$i] > $max_a) {
        $h -= $b[$i];
        $cnt++;
        if ($h <= 0) {
            break;
        }
    }
}
if ($h > 0) {
    $cnt += intval(ceil($h / $max_a));
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
