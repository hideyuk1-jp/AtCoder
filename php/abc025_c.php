<?php
for ($i = 0; $i < 2; ++$i) $b[] = ints();
for ($i = 0; $i < 3; ++$i) $c[] = ints();
echo implode(PHP_EOL, dfs()) . PHP_EOL;
function dfs($d = 0, $state = '---------')
{
    global $memo;
    if ($d === 9) return calcScore($state);
    if (isset($memo[$state])) return $memo[$state];
    $char = $d % 2 === 0 ? 'o' : 'x';
    $cnt = [];
    for ($i = 0; $i < 9; ++$i) {
        if ($state[$i] !== '-') continue;
        $tstate = $state;
        $tstate[$i] = $char;
        $cnt[] = dfs($d + 1, $tstate);
    }
    $maxi = -1;
    $max = PHP_INT_MIN;
    $j = $d % 2 === 0 ? 0 : 1;
    foreach ($cnt as $i => $v) {
        if ($v[$j] > $max) {
            $max = $v[$j];
            $maxi = $i;
        }
    }
    $memo[$state] = $cnt[$maxi];
    return $memo[$state];
}
function calcScore($state)
{
    global $b, $c;
    $score = [0, 0];
    // b
    for ($i = 0; $i < 2; ++$i) {
        for ($j = 0; $j < 3; ++$j) {
            if ($state[$i * 3 + $j] === $state[($i + 1) * 3 + $j]) $score[0] += $b[$i][$j];
            else $score[1] += $b[$i][$j];
        }
    }
    // c
    for ($i = 0; $i < 3; ++$i) {
        for ($j = 0; $j < 2; ++$j) {
            if ($state[$i * 3 + $j] === $state[$i * 3 + $j + 1]) $score[0] += $c[$i][$j];
            else $score[1] += $c[$i][$j];
        }
    }
    return $score;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
