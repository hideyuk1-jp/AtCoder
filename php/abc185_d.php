<?php

[$N, $M] = ints();
$a = ints();
if ($M === 0) {
    exit("1");
}
$a[] = 0;
$a[] = $N + 1;
sort($a);
$dur = [];
for ($i = 0; $i < $M + 1; ++$i) {
    if ($a[$i + 1] - $a[$i] - 1 > 0) {
        if (!isset($dur[$a[$i + 1] - $a[$i] - 1])) {
            $dur[$a[$i + 1] - $a[$i] - 1]  = 1;
        } else {
            ++$dur[$a[$i + 1] - $a[$i] - 1];
        }
    }
}
if (count($dur) === 0) {
    exit("0");
}
$k = min(array_keys($dur));
$cnt = 0;
foreach ($dur as $v => $c) {
    $cnt += $c * ($v % $k ? intdiv($v, $k) + 1 : intdiv($v, $k));
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
