<?php
list($n, $m) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($a, $b) = ints();
    $a--;
    $b--;
    $g[$a][] = $b;
    $g[$b][] = $a;
}
echo dfs();
function dfs($v = 0, $used = [])
{
    global $n, $g;
    $used[$v] = true;
    if (count($used) === $n) return 1;
    if (is_null($g[$v])) return 0;
    $res = 0;
    foreach ($g[$v] as $to) {
        if ($used[$to]) continue;
        $res += dfs($to, $used);
    }
    return $res;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
