<?php
list($D) = ints();
$k = 26;
$c = ints();
for ($i = 0; $i < $D; ++$i) $s[] = ints();
for ($i = 0; $i < $D; ++$i) {
    list($t[$i]) = ints();
    --$t[$i]; // 0-indexed
}
$score = calcScore($t);
list($M) = ints();
for ($i = 0; $i < $M; ++$i) {
    list($d, $q) = ints();
    $score += update($d - 1, $q - 1);
    $ans[] = $score;
}
echo implode(PHP_EOL, $ans);

function calcScore($t)
{
    global $D, $k, $c, $s;
    $last = array_fill(0, $k, 0);
    $res = 0;
    for ($i = 0; $i < $D; ++$i) {
        $res += $s[$i][$t[$i]];
        $last[$t[$i]] = $i + 1;
        for ($j = 0; $j < $k; ++$j) $res -= $c[$j] * ($i + 1 - $last[$j]);
    }
    return $res;
}
function update($d, $q)
{
    global $D, $s, $c, $t;
    $p = $t[$d];
    $pp = $pq = -1;
    $np = $nq = $D;
    for ($i = 0; $i < $D; ++$i) {
        if ($t[$i] === $p) {
            if ($i < $d) $pp = $i;
            if ($i > $d && $np === $D) $np = $i;
        }
        if ($t[$i] === $q) {
            if ($i < $d) $pq = $i;
            if ($i > $d && $nq === $D) $nq = $i;
        }
    }
    $res = $s[$d][$q] - $s[$d][$p];
    $res -= $c[$p] * ($d - $pp) * ($np - $d);
    $res += $c[$q] * ($d - $pq) * ($nq - $d);

    $t[$d] = $q;
    return $res;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
