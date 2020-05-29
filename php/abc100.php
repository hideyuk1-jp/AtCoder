<?php
// C
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 0;
for ($i = 0; $i < $n; $i++) {
    while (!($a[$i] % 2)) {
        $ans++;
        $a[$i] /= 2;
    }
}
echo $ans;

exit;

// B
fscanf(STDIN, '%d %d', $d, $n);
if ($n === 100) $n++;
echo $n * 100 ** $d;

exit;

// A
fscanf(STDIN, '%d %d', $a, $b);
echo max($a, $b) > 8 ? ':(' : 'Yay!';
