<?php
// A
fscanf(STDIN, '%d', $T);
for ($t  = 0; $t < $T; $t++) {
    fscanf(STDIN, '%d %d %d %d %d', $N, $A, $B, $C, $D);
    $memo = [0, $D];
    $ans[] = f($N);
}
echo implode(PHP_EOL, $ans);

function f($N)
{
    global $memo, $A, $B, $C, $D;
    if (isset($memo[$N])) return $memo[$N];
    $c = $N * $D;
    foreach ([[2, $A], [3, $B], [5, $C]] as list($x, $X)) {
        $q = intdiv($N, $x);
        $r = $N % $x;
        $c = min($c, $X + $r * $D + f($q));
        if ($r > 0) $c = min($c, $X + ($x - $r) * $D + f($q + 1));
    }
    $memo[$N] = $c;
    return $memo[$N];
}
