<?php

[$N, $K] = ints();
for ($i = 2; $i <= 2 * $N; $i++) {
    $x[$i] = min($i - 1, 2 * $N + 1 - $i);
}
$ans = 0;
for ($i = 2; $i <= 2 * $N; $i++) {
    $ans += $x[$i] * ($x[$i - $K] ?? 0);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
