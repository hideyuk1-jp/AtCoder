<?php
[$N] = ints();
[$S] = strs();
[$X] = strs();
$d = 10 ** ($N - 1);
$t = 0;
for ($i = 0; $i < $N; ++$i) {
    $t += intval($S[$i]) * $d;
    if ($i === $N - 1 || $X[$i] !== $X[$i + 1]) {
        $a[] = $t % 7;
        $t = 0;
        $x[] = $X[$i];
    }
    $d /= 10;
}
var_dump($a, $x);
$n = count($a);
$win = array_fill(0, 7, false);
$win[0] = true;
for ($i = $n - 1; $i >= 0; --$i) {
    for ($k = 0; $k < 7; ++$k) {
        if ($win[$k]) {
            $win[($k + $a[$i]) % 7] = true;
        }
    }
    $wincnt = 0;
    for ($k = 0; $k < 7; ++$k)
        if ($win[$k]) $wincnt++;

    if ($x[$i] === 'A') {
        if ($wincnt < 7) $ans = 'AOKI';
    } else {
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
