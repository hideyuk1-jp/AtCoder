<?php

fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$b = array_map('intval', explode(' ', trim(fgets(STDIN))));

$p = new SplPriorityQueue();
for ($i = 0; $i < $n; $i++) {
    $c[$i] = $b[$i] - $a[$i];
    $p->insert([$c[$i], $i], $c[$i]);
}

$cnt = 0;
while (true) {
    if ($b === $a) {
        break;
    }
    $p_tmp = $p->extract();
    $max = $p_tmp[0];
    $i = $p_tmp[1];
    $ni = $i + 1;
    $pi = $i - 1;
    if ($ni === $n) {
        $ni = 0;
    }
    if ($pi === -1) {
        $pi = $n - 1;
    }
    if ($b[$i] >= $b[$ni] + $b[$pi]) {
        $b[$i] -= ($b[$ni] + $b[$pi]);
        $c[$i] = $b[$i] - $a[$i];
        $p->insert([$c[$i], $i], $c[$i]);
        $cnt++;
    } else {
        $cnt = -1;
        break;
    }
}
echo $cnt . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);

for ($i = 1; $i <= 3 * $n; $i++) {
    if ($s[$i] === 'R') {
        $r[] = $i;
    } elseif ($s[$i] === 'G') {
        $g[] = $i;
    } elseif ($s[$i] === 'B') {
        $b[] = $i;
    }
}



exit();

fscanf(STDIN, '%s', $s);
$n = strlen($s);
$arr = [$s[0]];
$s_tmp = '';
for ($i = 1; $i < $n; $i++) {
    $m = count($arr);
    $s_tmp = $s_tmp . $s[$i];
    if ($arr[$m-1] !== $s_tmp) {
        $arr[] = $s_tmp;
        $s_tmp = '';
    }
}
$ans = count($arr);
echo $ans . PHP_EOL;
