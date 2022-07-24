<?php

// abc016_d 線分で多角形が何個に分割されるか問う問題
// 与えられた線分と多角形の辺が交差する数cを求めると c/2+1が答え
list($ax, $ay, $bx, $by) = ints();
list($n) = ints();
$cnt = 0;
for ($i = 0; $i <= $n; ++$i) {
    if ($i < $n) {
        list($x[$i], $y[$i]) = ints();
    }
    if ($i === 0) {
        continue;
    }
    if ($i < $n) {
        list($cx, $cy, $dx, $dy) = [$x[$i - 1], $y[$i - 1], $x[$i], $y[$i]];
    } else {
        list($cx, $cy, $dx, $dy) = [$x[$n - 1], $y[$n - 1], $x[0], $y[0]];
    }
    if (isCross($ax, $ay, $bx, $by, $cx, $cy, $dx, $dy)) {
        ++$cnt;
    }
}
echo(intdiv($cnt, 2) + 1) . PHP_EOL;
// 線分abと線分cdの交差判定
function isCross($ax, $ay, $bx, $by, $cx, $cy, $dx, $dy)
{
    $ta = ($cx - $dx) * ($ay - $cy) + ($cy - $dy) * ($cx - $ax);
    $tb = ($cx - $dx) * ($by - $cy) + ($cy - $dy) * ($cx - $bx);
    $tc = ($ax - $bx) * ($cy - $ay) + ($ay - $by) * ($ax - $cx);
    $td = ($ax - $bx) * ($dy - $ay) + ($ay - $by) * ($ax - $dx);

    return $tc * $td < 0 && $ta * $tb < 0;
    // return $tc * $td <= 0 && $ta * $tb <= 0; // 端点を含む場合
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
