<?php
// 解説の解法
// カコモンジムに通った方が良いうちはカコモンジムに通って、残りはAtCoderジムに通うのが最適
[$X, $Y, $A, $B] = ints();
$ans = 0;
while ($X * $A <= $X + $B && $X * $A < $Y) {
    $X *= $A;
    ++$ans;
}
echo $ans + intdiv($Y - 1 - $X, $B);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
