<?php

list($n, $r) = ints();
list($s) = strs();
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === '.') {
        $max = $i;
    }
}
if (!isset($max)) {
    exit('0' . PHP_EOL);
}
$cnt = 0;
$ok = -1;
for ($i = 0; $i < $n; ++$i) {
    // 最も遠い塗られてないマスまで届く範囲にきたら発射する
    if ($i + $r - 1 >= $max) {
        ++$cnt;
        break;
    }
    //　発射により塗られているならスキップ
    if ($i <= $ok) {
        continue;
    }
    // 足下が塗られていなければ銃を発射
    if ($s[$i] === '.') {
        ++$cnt;
        $ok = $i + $r - 1;
    }
}
echo($i + $cnt) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
