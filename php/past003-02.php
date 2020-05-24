<?php
// I 6
fscanf(STDIN, '%d', $N);
fscanf(STDIN, '%d', $Q);
for ($i = 1; $i <= $N; $i++) {
    $gi[$i] = $i;
    $gj[$i] = $i;
}
for ($i = 0; $i < $Q; $i++) {
    $q = array_map('intval', explode(' ', trim(fgets(STDIN))));
    if ($q[0] === 1) {
        list($gi[$q[1]], $gi[$q[2]]) = [$gi[$q[2]], $gi[$q[1]]];
    } elseif ($q[0] === 2) {
        list($gj[$q[1]], $gj[$q[2]]) = [$gj[$q[2]], $gj[$q[1]]];
    } elseif ($q[0] === 3) {
        list($gi, $gj) = [$gj, $gi];
    } elseif ($q[0] === 4) {
        $ans[] = $N * ($gi[$q[1]] - 1) + $gj[$q[2]] - 1;
    }
}
echo implode(PHP_EOL, $ans);

exit;

// H 6
fscanf(STDIN, '%d %d', $N, $L);
$x = array_map('intval', explode(' ', trim(fgets(STDIN))));
$T = array_map('intval', explode(' ', trim(fgets(STDIN))));

$h = array_fill(0, $L + 1, false);
for ($i = 0; $i < $N; $i++) $h[$x[$i]] = true;

$memo[$L] = $memo[$L + 1] = $memo[$L + 2] = $memo[$L + 3] = 0;
for ($i = $L; $i >= 1; $i--) f($i);
echo $memo[0];

function f($d)
{
    global $h, $memo, $L, $T;

    if ($d === 0) return;

    // 1
    $t1 = $memo[$d] + $T[0];
    if ($h[$d - 1]) $t1 += $T[2];

    // 2
    if ($d - 1 + 2 <= $L) {
        $t2 = $memo[$d + 1] + $T[0] * 0.5 +  $T[1] + $T[0] * 0.5;
        if ($h[$d - 1]) $t2 += $T[2];
    } else {
        $o = $d + 1 - $L - 0.5;
        $t2 = $memo[$d + 1] + $T[0] * 0.5 +  $T[1] * (1 - $o);
        if ($h[$d - 1]) $t2 += $T[2];
    }

    // 4
    if ($d - 1 + 4 <= $L) {
        $t4 = $memo[$d + 3] + $T[0] * 0.5 +  $T[1] * 3 + $T[0] * 0.5;
        if ($h[$d - 1]) $t4 += $T[2];
    } else {
        $o = $d - 1 + 4 - $L - 0.5;
        $t4 = $memo[$d + 3] + $T[0] * 0.5 +  $T[1] * (3 - $o);
        if ($h[$d - 1]) $t4 += $T[2];
    }

    $memo[$d - 1] = min($t1, $t2, $t4);
}
