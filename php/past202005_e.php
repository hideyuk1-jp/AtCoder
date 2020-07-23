<?php
list($n, $m, $q) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($u, $v) = ints();
    --$u;
    --$v;
    $g[$u][] = $v;
    $g[$v][] = $u;
}
$c = ints();
for ($i = 0; $i < $q; ++$i) {
    list($type, $x, $y) = ints();
    --$x;
    $ans[] = $c[$x];
    if ($type === 1) {
        if (!isset($g[$x])) continue;
        foreach ($g[$x] as $nx) $c[$nx] = $c[$x];
    } else {
        $c[$x] = $y;
    }
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
