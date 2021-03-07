<?php
[$N, $M] = ints();
for ($i = 0; $i < $M; ++$i) {
    [$a[], $b[]] = ints();
}
[$K] = ints();
for ($i = 0; $i < $K; ++$i) {
    [$c[], $d[]] = ints();
}
$max = 0;
for ($i = 0; $i < 2 ** $K; ++$i) {
    $cnt = array_fill(1, $N, 0);
    for ($j = 0; $j < $K; $j++) {
        if (($i >> $j) & 1) {
            ++$cnt[$c[$j]];
        } else {
            ++$cnt[$d[$j]];
        }
    }
    // 満たされる条件の個数の計算
    $tmp = 0;
    for ($j = 0; $j < $M; ++$j) {
        if ($cnt[$a[$j]] && $cnt[$b[$j]]) ++$tmp;
    }
    $max = max($max, $tmp);
}
echo $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
