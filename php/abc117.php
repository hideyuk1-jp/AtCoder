<?php
fscanf(STDIN, '%d %d', $n, $m);
$x = array_map('intval', explode(' ', trim(fgets(STDIN))));
if ($n >= $m) {
    echo 0;
    exit;
}
sort($x);
for ($i = 1; $i < $m; $i++) {
    $d[] = $x[$i] - $x[$i - 1];
}
sort($d);
$sum = 0;
for ($i = 0; $i < $m - $n; $i++) {
    $sum += $d[$i];
}
echo $sum;

exit;

fscanf(STDIN, '%d', $n);
$l = array_map('intval', explode(' ', trim(fgets(STDIN))));
$max = $sum = 0;
for ($i = 0; $i < $n; $i++) {
    $sum += $l[$i];
    $max = max($l[$i], $max);
}
$ans = 2 * $max < $sum ? 'Yes' : 'No';
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d', $t, $x);
echo $t / $x;
