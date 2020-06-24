<?php
list($n) = ints();
$dates = [0, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
for ($i = 0; $i <= 13; ++$i) $sumd[$i] = ($sumd[$i - 1] ?? 0) + ($dates[$i - 1]);
for ($i = 0; $i < $n; ++$i) {
    list($m, $d) = array_map('intval', explode('/', trim(fgets(STDIN))));
    $holi[$sumd[$m] + $d] = 1;
}
$c = $cnt = $ans = 0;
for ($i = 1; $i <= 366; ++$i) {
    if ($i % 7 === 1 || $i % 7 === 0) {
        if (isset($holi[$i])) ++$holi[$i];
        else $holi[$i] = 1;
    } else {
        if (!isset($holi[$i])) $holi[$i] = 0;
    }
    $c += $holi[$i];
    if ($c > 0) {
        ++$cnt;
        --$c;
    } else {
        if ($cnt > 0) $ans = max($ans, $cnt);
        $cnt = 0;
    }
}
if ($cnt > 0) $ans = max($ans, $cnt);
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
