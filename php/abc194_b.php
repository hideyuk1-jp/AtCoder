<?php
[$N] = ints();
for ($i = 0; $i < $N; ++$i) {
    [$a[], $b[]] = ints();
}
asort($a);
asort($b);
$ca = 0;
$min = PHP_INT_MAX;
foreach ($a as $ia => $va) {
    if ($ca > 1) break;
    $cb = 0;
    foreach ($b as $ib => $vb) {
        if ($cb > 1) break;
        if ($ia === $ib) $min = min($min, $va + $vb);
        else $min = min($min, max($va, $vb));
        $cb++;
    }
    $ca++;
}
echo $min;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
