<?php

// mex
[$N, $M] = ints();
$a = ints();
// prev[num]: 前に数字numが出現したindexを記録
$prev = array_fill(0, $N + 1, -1);
// intervalMax[num]: 数字numが現れない最も長い区間を記録
// これがM以上だとmex minの答えの候補
$intervalMax = array_fill(0, $N + 1, 0);
for ($i = 0; $i < $N; ++$i) {
    $intervalMax[$a[$i]] = max($intervalMax[$a[$i]], $i - $prev[$a[$i]] - 1);
    $prev[$a[$i]] = $i;
}
for ($i = 0; $i <= $N; ++$i) {
    $intervalMax[$i] = max($intervalMax[$i], $N - $prev[$i] - 1);
}
for ($i = 0; $i <= $N; ++$i) {
    if ($intervalMax[$i] >= $M) {
        echo $i, PHP_EOL;
        break;
    }
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
