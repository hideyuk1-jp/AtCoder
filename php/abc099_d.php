<?php
list($N, $C) = ints();
for ($i = 0; $i < $C; ++$i) $D[] = ints();
for ($i = 0; $i < $N; ++$i) {
    $c[] = ints();
    for ($j = 0; $j < $N; ++$j) --$c[$i][$j];
}
echo dfs();
// 3種類のマスに3色を選ぶ全探索
function dfs($d = 0, $selected = [])
{
    global $C;
    if ($d === 3) return calcD(array_keys($selected));
    for ($i = 0; $i < $C; ++$i) {
        if (isset($selected[$i])) continue;
        $_selected = $selected;
        $_selected[$i] = true;
        $res[] = dfs($d + 1, $_selected);
    }
    return min($res);
}
// 違和感の計算
function calcD($a)
{
    global $memo;
    $res = 0;
    for ($mod = 0; $mod < 3; ++$mod) {
        // memo[mod][c]: 余り i になるマスを色 c に塗り替えた時の違和感の和
        if (!isset($memo[$mod][$a[$mod]])) $memo[$mod][$a[$mod]] = subCalcD($mod, $a[$mod]);
        $res += $memo[$mod][$a[$mod]];
    }
    return $res;
}
function subCalcD($mod, $to)
{
    global $N, $D, $c;
    $res = 0;
    for ($i = 0; $i < $N; ++$i) {
        for ($j = ($mod + 2 * $i) % 3; $j < $N; $j += 3) {
            $from = $c[$i][$j];
            $res += $D[$from][$to];
        }
    }
    return $res;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
