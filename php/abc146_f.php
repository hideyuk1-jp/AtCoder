<?php
list($n, $m) = ints();
list($s) = strs();
$s = strrev($s); // 辞書順昇順にするため、ゴール→スタートへ出来るだけ多く移動していく
// そのマスから移動可能な最も右のマスを求める
$rightestNext = array_fill(0, $n + 1, -1);
$rightestZero = -1;
for ($i = 0; $i <= $n; ++$i) {
    if ($s[$i] === '0') $rightestZero = $i;

    if (max(0, $i - $m) < $rightestZero) $rightestNext[max(0, $i - $m)] = $rightestZero;
    if ($i >= $n - $m) $rightestNext[$i] = $n;
}
// 辿る
$cur = 0;
while ($cur < $n) {
    if ($rightestNext[$cur] === -1) exit('-1');
    $ans[] = $rightestNext[$cur] - $cur;
    $cur = $rightestNext[$cur];
}
// 順番をスタート→ゴールに戻す
krsort($ans);
echo implode(' ', $ans);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
