<?php

list($t) = ints();
for ($i = 0; $i < $t; ++$i) {
    list($n) = ints();
    $a = ints();
    list($s) = strs();
    $ans[] = solve();
}
echo implode(PHP_EOL, $ans);
function solve()
{
    global $n, $a, $s;
    $base = [];
    for ($i = $n - 1; $i >= 0; --$i) {
        // ai が ai+1 ~ an の基底で表現できるかどうか
        $x = $a[$i];
        foreach ($base as $b) {
            $x = min($x, $x ^ $b);
        }
        if ($x) { // 0でなけれな表現不可能
            if ($s[$i] === '0') { // 0の番であれば基底追加
                $base[] = $x;
                rsort($base);
            } else { // 1の番であれば1の勝ちが確定
                return 1;
            }
        }
    }
    return 0;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
