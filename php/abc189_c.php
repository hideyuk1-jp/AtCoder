<?php
[$N] = ints();
$a = ints();
$maxSum = $a[0];
for ($l = 0; $l < $N; ++$l) {
    $min = $a[$l];
    for ($r = $l; $r < $N; ++$r) {
        $min = min($min, $a[$r]);
        if ($min * ($N - $l + 1) <= $maxSum) break;
        $maxSum = max($maxSum, $min * ($r - $l + 1));
    }
}
echo $maxSum;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
