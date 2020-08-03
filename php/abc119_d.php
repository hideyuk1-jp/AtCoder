<?php
$debug = false;
list($a, $b, $q) = ints();
for ($i = 0; $i < $a; ++$i) {
    list($s[]) = ints();
}
for ($i = 0; $i < $b; ++$i) {
    list($t[]) = ints();
}
sort($s);
sort($t);
for ($i = 0; $i < $q; ++$i) {
    list($x) = ints();

    // 右にある物のうち最も左の神社と左にある物のうち最も右にある神社の距離
    list($ls, $rs) = nibutan($a, $s, $x);
    // 右にある物のうち最も左の寺と左にある物のうち最も右にある寺の距離
    list($lt, $rt) = nibutan($b, $t, $x);

    $tmp = [];
    // 左にのみ進む
    $tmp[] = max($ls, $lt);
    // 右にのみ進む
    $tmp[] = max($rs, $rt);
    // 右の神社と左の寺
    $tmp[] = min($rs, $lt) * 2 + max($rs, $lt);
    // 左の神社と右の寺
    $tmp[] = min($ls, $rt) * 2 + max($ls, $rt);

    if ($debug) {
        var_dump($x, $ls, $rs, $lt, $rt);
    }

    $ans[] = min($tmp);
}
echo implode(PHP_EOL, $ans);
function nibutan($n, $arr, $x)
{
    $ok = $n;
    $ng = -1;
    while (abs($ok - $ng) > 1) {
        $mid = intdiv($ok + $ng, 2);
        if ($arr[$mid] > $x) $ok = $mid;
        else $ng = $mid;
    }
    $r = $ok !== $n ? abs($arr[$ok] - $x) : PHP_INT_MAX;
    $l = $ng !== -1 ? abs($arr[$ng] - $x) : PHP_INT_MAX;
    return [$l, $r];
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
