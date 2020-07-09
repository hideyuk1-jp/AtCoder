<?php
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) list($s[]) = strs();
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($i < $h - 1 && $s[$i][$j] !== $s[$i + 1][$j]) {
            $g[$i][$j][] = [$i + 1, $j];
            $g[$i + 1][$j][] = [$i, $j];
        }
        if ($j < $w - 1 && $s[$i][$j] !== $s[$i][$j + 1]) {
            $g[$i][$j][] = [$i, $j + 1];
            $g[$i][$j + 1][] = [$i, $j];
        }
    }
}
$seen = array_fill(0, $h, array_fill(0, $w, false));
$ans = 0;
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if (!$seen[$i][$j]) {
            list($cb, $cw) = dfs($i, $j);
            $ans += $cb * $cw;
        }
    }
}
echo $ans;
function dfs($i, $j)
{
    global $g, $seen, $s;
    $seen[$i][$j] = true;

    $res = $s[$i][$j] === '#' ? [1, 0] : [0, 1];
    if (is_null($g[$i][$j])) return $res;
    foreach ($g[$i][$j] as list($ni, $nj)) {
        if ($seen[$ni][$nj]) continue;
        list($cb, $cw) = dfs($ni, $nj);
        $res[0] += $cb;
        $res[1] += $cw;
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
