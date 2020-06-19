<?php
list($n, $k) = ints();
for ($i = 0; $i < $n; ++$i) $t[] = ints();
echo dfs() ? 'Found' : 'Nothing';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function dfs($d = 0, $v = 0)
{
    global $n, $k, $t, $memo;
    if (isset($memo[$d][$v])) return $memo[$d][$v];
    if ($d === $n) {
        $memo[$d][$v] = $v === 0;
        return $memo[$d][$v];
    }
    for ($i = 0; $i < $k; ++$i) {
        if (dfs($d + 1, $v ^ $t[$d][$i])) {
            $memo[$d][$v] = true;
            return $memo[$d][$v];
        }
    }
    $memo[$d][$v] = false;
    return $memo[$d][$v];
}
