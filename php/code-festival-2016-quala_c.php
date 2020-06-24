<?php
list($s) = strs();
list($k) = ints();
for ($i = 0; $i < 26; ++$i) $a2n[chr(97 + $i)] = $i;
$n = strlen($s);
// 先頭から順番にaに出来るものをaにする
for ($i = 0; $i < $n; ++$i) {
    $x = $a2n[$s[$i]];
    if ($x === 0) continue;
    if ($k >= 26 - $x) {
        $s[$i] = 'a';
        $k -= 26 - $x;
    }
}
// 残ったkは全部最後の文字に使う
if ($k > 0) $s[$n - 1] = chr(97 + ($a2n[$s[$n - 1]] + $k) % 26);
echo $s . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
