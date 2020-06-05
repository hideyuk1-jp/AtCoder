<?php
// C
fscanf(STDIN, '%d', $n);
for ($i = 0; $i < $n; $i++) fscanf(STDIN, '%d %d', $a[], $b[]);
for ($i = 0; $i < $n; $i++) fscanf(STDIN, '%d %d', $c[], $d[]);
array_multisort($b, SORT_DESC, $a);
array_multisort($c, SORT_ASC, $d);
for ($j = 0; $j < $n; $j++) {
    $flag = false;
    foreach ($a as $i => $v) {
        if ($a[$i] < $c[$j] && $b[$i] < $d[$j]) {
            $flag = true;
            break;
        }
    }
    if ($flag) unset($a[$i]);
}
echo $n - count($a);

exit;

// B
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%s', $s);
    if (isset($a[$s])) $a[$s]++;
    else $a[$s] = 1;
}
fscanf(STDIN, '%d', $m);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%s', $t);
    if (isset($a[$t])) $a[$t]--;
    else $a[$t] = -1;
}
echo max(0, max($a));

exit;

// A
fscanf(STDIN, '%d %d %d', $a, $b, $c);
echo $a + $b >= $c ? 'Yes' : 'No';
