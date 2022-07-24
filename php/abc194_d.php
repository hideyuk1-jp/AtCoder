<?php

// 確率pで起こる事象を起こるまで繰り返す場合の回数の期待値は1/pの考え方を使う
[$N] = ints();
$ans = 0;
for ($i = 1; $i < $N; ++$i) {
    $ans += $N / $i;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
