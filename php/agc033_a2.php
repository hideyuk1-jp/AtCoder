<?php
// BFSで解いてみる（多点スタートな最短経路問題）
list($h, $w) = ints();
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, $h, array_fill(0, $w, -1)); // 距離を格納する配列（-1の場合はその頂点が未発見）
for ($i = 0; $i < $h; ++$i) {
    list($s[$i]) = strs();
    for ($j = 0; $j < $w; ++$j) {
        if ($s[$i][$j] === '#') {
            // 多点をスタートとして扱う
            $dist[$i][$j] = 0;
            $q->enqueue([$i, $j]);
        }
    }
}
$dy = [1, 0, -1, 0];
$dx = [0, 1, 0, -1];
// BFS
while (!$q->isEmpty()) {
    list($y, $x) = $q->dequeue();
    for ($dir = 0; $dir < 4; ++$dir) {
        $ny = $y + $dy[$dir];
        $nx = $x + $dx[$dir];
        if ($ny > $h - 1 || $ny < 0 || $nx > $w - 1 || $nx < 0) continue; // 範囲外
        if ($dist[$ny][$nx] !== -1) continue; // 発見済み
        $dist[$ny][$nx] = $dist[$y][$x] + 1;
        $q->enqueue([$ny, $nx]);
    }
}
$max = 0;
for ($i = 0; $i < $h; ++$i) $max = max($max, max($dist[$i]));
echo $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
