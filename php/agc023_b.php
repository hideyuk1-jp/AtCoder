<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($s[]) = strs();
// A, B が良い盤面 A+1, B+1 ~ A+N-1, B+N-1 も良い盤面
$ans = 0;
for ($i = 0; $i < $n; ++$i) if (check(0, $i)) $ans += $n;
echo $ans;
function check($a, $b)
{
    global $n, $s;
    for ($i = 1; $i < $n; ++$i) {
        for ($j = 0; $j < $i; ++$j) {
            if ($s[($i + $a) % $n][($j + $b) % $n] !== $s[($j + $a) % $n][($i + $b) % $n]) return false;
        }
    }
    return true;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
