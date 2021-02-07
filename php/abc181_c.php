<?php
[$N] = ints();
for ($i = 0; $i < $N; ++$i) {
    [$x[], $y[]] = ints();
}
$ans = 'No';
for ($i = 0; $i < $N - 2; ++$i) {
    for ($j = $i + 1; $j < $N - 1; ++$j) {
        for ($k = $j + 1; $k < $N; ++$k) {
            $t = calcAreaOfTri($x[$j] - $x[$i], $y[$j] - $y[$i], $x[$k] - $x[$i], $y[$k] - $y[$i]);
            // 三角形の面積が0ならば一直線上
            if ($t === 0) $ans = 'Yes';
        }
    }
}
echo $ans . PHP_EOL;
// (0, 0), (x1, y1), (x2, y2)の３頂点からなる三角形の面積を求める
function calcAreaOfTri($x1, $y1, $x2, $y2)
{
    return abs($x1 * $y2 - $x2 * $y1) / 2;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
