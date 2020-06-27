<?php
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) $c[] = ints();
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        $dp[$i][$j] = ($dp[$i - 1][$j] ?? 0) + ($dp[$i][$j - 1] ?? 0) - ($dp[$i - 1][$j - 1] ?? 0);
        if (($i + $j) % 2) $dp[$i][$j] -= $c[$i][$j];
        else $dp[$i][$j] += $c[$i][$j];
    }
}
$max = 0;
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        for ($k = $h - 1; $k >= $i; --$k) {
            for ($l = $w - 1; $l >= $j; --$l) {
                $area = ($k - $i + 1) * ($l - $j + 1);
                if ($max >= $area) break;
                $t = $dp[$k][$l] - ($dp[$k][$j - 1] ?? 0) - ($dp[$i - 1][$l] ?? 0) + ($dp[$i - 1][$j - 1] ?? 0);
                if ($t === 0) {
                    $max = $area;
                    break;
                }
            }
        }
    }
}
echo $max . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
