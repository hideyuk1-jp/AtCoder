<?php
// C
fscanf(STDIN, '%d', $n);
if (!$n) exit('0');
$b = '';
while ($n) {
    if ($n % 2) {
        $b .= '1';
        $n--;
    } else {
        $b .= '0';
    }
    $n /= -2;
}
echo strrev($b);

exit;

// B
fscanf(STDIN, '%d', $n);
$c = intdiv($n, 7);
$ans = 'No';
for ($i = 0; $i <= $c; $i++) {
    if (($n - $i * 7) % 4 === 0) {
        $ans = 'Yes';
        break;
    }
}
echo $ans;

exit;

// A
fscanf(STDIN, '%d %d', $n, $k);
echo $n % $k > 0 ? 1 : 0;
