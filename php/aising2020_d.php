<?php
list($n) = ints();
list($x) = strs();
$pcx = popcount($x);
$mod2[0][$pcx + 1] = 1 % ($pcx + 1);
if ($pcx > 1) $mod2[0][$pcx - 1] = 1;
for ($i = 1; $i < $n; ++$i) {
    $mod2[$i][$pcx + 1] = $mod2[$i - 1][$pcx + 1] * 2 % ($pcx + 1);
    if ($pcx > 1) $mod2[$i][$pcx - 1] = $mod2[$i - 1][$pcx - 1] * 2 % ($pcx - 1);
}
$xmodp = f($x, $pcx + 1);
$xmodm = $pcx > 1 ? f($x, $pcx - 1) : 0;
for ($i = 0; $i < $n; ++$i) {
    if ($x[$i] === '0') {
        $xt = ($xmodp + $mod2[$n - 1 - $i][$pcx + 1]) % ($pcx + 1);
    } else {
        if ($pcx <= 1) {
            $ans[] = 0;
            continue;
        }
        $xt = ($xmodm - $mod2[$n - 1 - $i][$pcx - 1] + ($pcx - 1)) % ($pcx - 1);
    }
    $ans[] = f2($xt) + 1;
}
echo implode(PHP_EOL, $ans);
function f($x, $pc)
{
    global $n, $mod2;
    if ($pc === 0) return 0;
    $mod = 0;
    for ($i = 0; $i < $n; ++$i)
        if ($x[$i] === '1') $mod = ($mod2[$n - 1 - $i][$pc] + $mod) % $pc;
    return $mod;
}
function f2($n)
{
    if ($n === 0) return 0;
    return 1 + f2($n % popcount(decbin($n)));
}
function popcount($x)
{
    $res = 0;
    for ($i = 0; $i < strlen($x); ++$i)
        if ($x[$i] === '1') ++$res;
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
