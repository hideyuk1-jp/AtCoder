<?php
[$K] = ints();
[$S] = strs();
[$T] = strs();
$left = array_fill(1, 9, $K);
$leftTotal = 9 * $K - 8;
$a = array_fill(1, 9, 0);
$b = array_fill(1, 9, 0);
for ($i = 0; $i < 4; ++$i) {
    --$left[$S[$i]];
    ++$a[$S[$i]];
    --$left[$T[$i]];
    ++$b[$T[$i]];
}
// var_dump($left, $a, $b);
$ans = 0;
for ($i = 1; $i <= 9; ++$i) {
    for ($j = 1; $j <= 9; ++$j) {
        $leftTmp = $left;
        $aTmp = $a;
        $bTmp = $b;
        ++$aTmp[$i];
        ++$bTmp[$j];
        $p = $leftTmp[$i] / $leftTotal;
        $leftTmp[$i] = max($leftTmp[$i] - 1, 0);
        $p *= $leftTmp[$j] / ($leftTotal - 1);
        if (calc($aTmp) > calc($bTmp)) {
            $ans += $p;
        }
    }
}
echo $ans;
function calc($a)
{
    $res = 0;
    for ($i = 1; $i <= 9; ++$i) {
        $res += $i * 10 ** $a[$i];
    }
    return $res;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
