<?php
// 優先度付待ち行列
// ABC137-D
fscanf(STDIN, '%d %d', $n, $m);
$s = array_fill(1, $m, NULL);
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $s[$a][] = $b;
}

$cnt = 0;
$q = new SplPriorityQueue();
for ($i = 1; $i <= $m; $i++) {
    foreach ($s[$i] as $v) {
        $q->insert($v, $v);
    }
    if (!$q->isEmpty()) $cnt += $q->extract();
}
echo $cnt.PHP_EOL;