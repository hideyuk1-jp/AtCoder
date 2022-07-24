<?php

$start = microtime(true);
list($n) = ints();
$k = 26;
$c = ints();
$last = array_fill(0, $k, 0);
for ($i = 1; $i <= $n; ++$i) {
    $s[$i] = ints();
    $max = PHP_INT_MIN;
    for ($p = 0; $p < $k; ++$p) {
        $ts = ($score[$i - 1] ?? 0) + $s[$i][$p];
        for ($q = 0; $q < $k; ++$q) {
            if ($p === $q) {
                continue;
            }
            $ts -= $c[$q] * ($i - $last[$q]);
        }
        if ($ts > $max) {
            $max = $ts;
            $maxp = $p;
        }
    }
    $score[$i] = $max;
    $ans[$i] = $maxp + 1;
    $last[$maxp] = $i;
}
$score = $score[365];
while (true) {
    for ($i = 365; $i >= 1; --$i) {
        for ($p = 1; $p <= $k - 1; ++$p) {
            $anst = $ans;
            $anst[$i] = ($ans[$i] + $p) % 26;
            $scoret = calcScore($anst);
            $diff = $scoret - $score;
            if ($diff > 0) {
                $ans = $anst;
                $score = $scoret;
                break;
            }
        }
        $now = microtime(true);
        if ($now - $start > 1.9) {
            break 2;
        }
    }
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function calcScore($ans)
{
    global $c, $s;
    $last = array_fill(0, 26, 0);
    $score[0] = 0;
    for ($i = 1; $i <= 365; ++$i) {
        $score[$i] = ($score[$i - 1] ?? 0) + $s[$i][$ans[$i]];
        $last[$ans[$i]] = $i;
        for ($q = 0; $q < 26; ++$q) {
            $score[$i] -= $c[$q] * ($i - $last[$q]);
        }
    }
    return $score[365];
}
