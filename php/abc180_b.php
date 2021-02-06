<?php
[$N] = ints();
$x = ints();
$ans = [0, 0, 0];
for ($i = 0; $i < $N; ++$i) {
    $ans[0] += abs($x[$i]);
    $ans[1] += $x[$i] ** 2;
    $ans[2] = max($ans[2], abs($x[$i]));
}
$ans[1] = sqrt($ans[1]);
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
