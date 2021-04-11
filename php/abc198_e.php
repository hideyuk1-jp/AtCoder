<?php
[$n] = ints();
$c = ints();
for ($i = 0; $i < $n - 1; ++$i) {
    [$a, $b] = ints();
    $a--;
    $b--;
    $g[$a][] = $b;
    $g[$b][] = $a;
}
$visited = array_fill(0, $n, false);
$cnt = array_fill(0, 10 ** 5 + 1, 0);
dfs();
sort($ans);
echo implode(PHP_EOL, $ans);
function dfs($s = 0)
{
    global $g, $c, $visited, $cnt, $ans;
    $visited[$s] = true;
    if ($cnt[$c[$s]] === 0) $ans[] = $s + 1;
    $cnt[$c[$s]]++;
    foreach ($g[$s] as $next) {
        if ($visited[$next]) continue;
        dfs($next);
    }
    $cnt[$c[$s]]--;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
