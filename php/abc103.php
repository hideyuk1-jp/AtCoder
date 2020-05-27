<?php
// D
fscanf(STDIN, '%d %d', $n, $m);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $a--;
    $b--;
    if (isset($x[$a])) {
        $x[$a] = min($x[$a], $b);
    } else {
        $x[$a] = $b;
    }
}
ksort($x);
$ans = 0;
$ok = -1;
foreach ($x as $i => $v) {
    if ($i > $ok) {
        $ans++;
        $ok = $v - 1;
    } else {
        $ok = min($ok, $v - 1);
    }
}
echo $ans;

exit;

// C
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
echo array_sum($a) - $n;

exit;

// B
fscanf(STDIN, '%s', $s);
fscanf(STDIN, '%s', $t);
for ($i = 0; $i < strlen($s); $i++) {
    $ss = substr($s, $i) . substr($s, 0, $i);
    if ($ss === $t) exit('Yes');
}
echo 'No';

exit;

// A
fscanf(STDIN, '%d %d %d', $a, $b, $c);
echo max($a, $b, $c) - min($a, $b, $c);
