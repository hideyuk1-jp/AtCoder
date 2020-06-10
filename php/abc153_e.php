<?php
list($h, $n) = array_map('intval', explode(' ', trim(fgets(STDIN))));
for ($i = 0; $i < $n; ++$i) list($a[], $b[]) = array_map('intval', explode(' ', trim(fgets(STDIN))));
$dp = array_fill(0, $h + 1, PHP_INT_MAX);
$dp[0] = 0;
for ($i = 1; $i <= $h; ++$i) {
    for ($j = 0; $j < $n; ++$j) {
        $d = $b[$j] + $dp[max(0, $i - $a[$j])];
        if ($dp[$i] > $d) $dp[$i] = $d;
    }
}
echo $dp[$h];
