<?php
list($n) = ints();
$a = ints();
echo dfs();
function dfs($i = 0)
{
    global $n, $a, $memo;
    if ($i === $n - 1) return 0;
    if (isset($memo[$i])) return $memo[$i];
    // 1個進む
    $res[] = dfs($i + 1) + abs($a[$i + 1] - $a[$i]);
    // ２個進む
    if ($i < $n - 2) $res[] = dfs($i + 2) + abs($a[$i + 2] - $a[$i]);
    $memo[$i] = min($res);
    return $memo[$i];
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
