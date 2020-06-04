<?php
// C
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$c = $a[-1] = $a[$n] = 0;
for ($i = 0; $i <= $n; $i++) $c += abs($a[$i] - $a[$i - 1]);
for ($i = 0; $i < $n; $i++) $ans[] = $c + abs($a[$i + 1]  - $a[$i - 1]) - (abs($a[$i] - $a[$i - 1]) + abs($a[$i + 1] - $a[$i]));
echo implode(PHP_EOL, $ans);

exit;

// B
fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%d %d', $d, $x);
$eat = 0;
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d', $a);
    $eat += intdiv($d - 1, $a) + 1;
}
echo $x + $eat;

exit;

// A
fscanf(STDIN, '%d', $a);
fscanf(STDIN, '%d', $b);
fscanf(STDIN, '%d', $c);
fscanf(STDIN, '%d', $d);
echo min($a, $b) + min($c, $d);
