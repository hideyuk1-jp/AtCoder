<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($x[$i], $y[$i], $p[$i]) = ints();
}
for ($k = 0; $k <= $n; ++$k) $ans[] = dfs($k);
echo implode(PHP_EOL, $ans);
function dfs($k = 0, $d = 0, $lxs = [true], $lys = [true])
{
    global $n, $x, $y, $cntx, $cnty;
    if (count($lxs) + count($lys) - 2 > $k) return PHP_INT_MAX;
    if ($d === $n || count($lxs) + count($lys) - 2 === $k) return calc($lxs, $lys);
    $res[] = dfs($k, $d + 1, $lxs, $lys);
    $_lxs = $lxs;
    $_lys = $lys;
    $_lxs[$x[$d]] = true;
    $_lys[$y[$d]] = true;
    $res[] = dfs($k, $d + 1, $_lxs, $lys);
    $res[] = dfs($k, $d + 1, $lxs, $_lys);
    $res[] = dfs($k, $d + 1, $_lxs, $_lys);
    return min($res);
}
function calc($lxs, $lys)
{
    global $n, $x, $y, $p;
    $res = 0;
    $lxs = array_keys($lxs);
    $lys = array_keys($lys);
    for ($i = 0; $i < $n; ++$i) {
        $dist = PHP_INT_MAX;
        foreach ($lxs as $lx)
            $dist = min($dist, abs($x[$i] - $lx));
        foreach ($lys as $ly)
            $dist = min($dist, abs($y[$i] - $ly));
        $res += $dist * $p[$i];
    }
    return $res;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
