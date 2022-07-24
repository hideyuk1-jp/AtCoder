<?php

define('WHITE', '.');
define('BLACK', '#');
[$H, $W] = ints();
for ($i = 0; $i < $H; ++$i) {
    [$S[]] = strs();
}
$cnt = 0;
// 頂点判定
for ($i = 0; $i < $H - 1; ++$i) {
    for ($j = 0; $j < $W - 1; ++$j) {
        $c = 0;
        // 頂点か
        if ($S[$i][$j] === BLACK) {
            $c++;
        }
        if ($S[$i][$j + 1] === BLACK) {
            $c++;
        }
        if ($S[$i + 1][$j] === BLACK) {
            $c++;
        }
        if ($S[$i + 1][$j + 1] === BLACK) {
            $c++;
        }

        $cnt += $c % 2;
    }
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
