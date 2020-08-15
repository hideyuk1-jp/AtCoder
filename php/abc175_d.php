<?php
list($n, $k) = ints();
$p = ints();
for ($i = 0; $i < $n; ++$i) --$p[$i];
$c = ints();
$max = PHP_INT_MIN;
for ($i = 0; $i < $n; ++$i) {
    $_k = $k;
    $visited = [];
    $visited[$i] = true;
    $ss = [];
    $s = 0;
    $cur = $i;
    $d = [];
    $d[$i] = 0;
    $cnt = 0;
    $loop = false;
    while ($cnt < $_k) {
        ++$cnt;
        $cur = $p[$cur];
        $s += $c[$cur];
        if (isset($visited[$cur])) {
            $loop = true;
            $_k -= $d[$cur];
            $loop_d = $cnt - $d[$cur];
            $loop_s = $s - $ss[$cur];
            break;
        }
        $ss[$cur] = $s;
        $visited[$cur] = true;
        $d[$cur] = $cnt;
    }
    if ($loop && $loop_s > 0) {
        $_max = $ss[$cur] + intdiv($_k, $loop_d) * $loop_s;
        $_k %= $loop_d;
        $s = $_max;
        for ($j = 0; $j < $_k; ++$j) {
            $cur = $p[$cur];
            $s += $c[$cur];
            $_max = max($_max, $s);
        }
        $max = max($max, $_max);
    } else {
        if (count($ss) > 0) $max = max($max, max($ss));
    }
}
echo $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
