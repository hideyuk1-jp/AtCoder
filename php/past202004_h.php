<?php
list($n, $m) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($x) = strs();
    for ($j = 0; $j < $m; ++$j) {
        if ($x[$j] === 'S') $s = [$i, $j];
        elseif ($x[$j] === 'G') $g = [$i, $j];
        else $a[$x[$j]][] = [$i, $j];
    }
}
for ($i = 1; $i <= 9; ++$i) if (!isset($a[$i])) exit('-1');
echo dfs(0, $s[0], $s[1]);
function dfs($d = 0, $fi, $fj)
{
    global $a, $g, $memo;
    if (isset($memo[$d][$fi][$fj])) return $memo[$d][$fi][$fj];
    if ($d === 9) {
        list($ti, $tj) = $g;
        return abs($ti - $fi) + abs($tj - $fj);
    }
    $res = [];
    foreach ($a[$d + 1] as list($ti, $tj))
        $res[] = dfs($d + 1, $ti, $tj) + abs($ti - $fi) + abs($tj - $fj);
    $memo[$d][$fi][$fj] = min($res);
    return $memo[$d][$fi][$fj];
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
