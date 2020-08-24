<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($a[]) = ints();
// pos[x] := 並べ替え後のxの位置(0-indexed)
$pos = $a;
sort($pos);
$pos = array_flip($pos);
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    // 並べ替えた後の位置と今の位置の差が奇数の場合は連続する二つを並べ替える必要あり
    if (abs($i - $pos[$a[$i]]) % 2) ++$cnt;
}
echo $cnt / 2, PHP_EOL; // 2つで1回反転するので2で割る
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
