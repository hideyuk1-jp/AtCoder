<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($a[]) = ints();
// 同じ色で塗れるマスをグループ分けした時のグループごとの末尾の値を格納
// この数より大きい数字であればこのグループに入れられる
$ends = [$a[0]];
for ($i = 1; $i < $n; ++$i) {
    // 二分探索で入れられるグループのうち末尾の値が最大のものを探す
    // endsは常にソート済（降順）
    $l = count($ends);
    $ok = $l;
    $ng = -1;
    while (abs($ok - $ng) > 1) {
        $mid = intdiv($ok + $ng, 2);
        if ($ends[$mid] < $a[$i]) $ok = $mid;
        else $ng = $mid;
    }
    // 見つからない場合はok=lなので要素が追加される
    $ends[$ok] = $a[$i];
}
echo count($ends);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
