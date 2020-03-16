<?php
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

exit();

fscanf(STDIN, '%d', $n);
$cnt = 0;
$arr = [];
for ($i  = 0; $i < $n; $i++) {
    $s = str_split(trim(fgets(STDIN)));
    sort($s);
    $s = implode('', $s);
    if (array_key_exists($s, $arr)) {
        $arr[$s]++;
        $cnt += $arr[$s] - 1;
    } else {
        $arr[$s] = 1;
    }
}
echo $cnt.PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$cnt = 0;
$arr = [];
for ($i  = 0; $i < $n; $i++) {
    $s = str_split(trim(fgets(STDIN)));
    $j = $s;
    sort($s);
    $j = implode('', $s);
    if (is_null($arr[$j])) {
        $arr[$j] = 1;
    } else {
        $cnt += $arr[$j];
        $arr[$j]++;
    }
}
echo $cnt.PHP_EOL;


exit();

fscanf(STDIN, '%d %d', $k, $x);
$start = $x - $k + 1;
$end = $x + $k - 1;
for ($i = $start; $i <= $end; $i++) {
    echo $i;
    if ($i === $end) echo PHP_EOL;
    else echo ' ';
}

exit();

fscanf(STDIN, '%d %d', $a, $b);

echo max($a+$b, $a-$b, $a*$b).PHP_EOL;